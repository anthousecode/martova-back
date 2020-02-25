<?php

namespace App\Admin\Controllers;

use App\Models\Gallery;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use File;
use App\Services\Cloud\GoogleDrive;
use Illuminate\Http\Request;
use Encore\Admin\Layout\Content;

class GalleryController extends AdminController
{
    protected $googleDrive;

    protected $request;

    public function __construct(GoogleDrive $googleDrive, Request $request)
    {
        $this->googleDrive = $googleDrive;
        $this->request = $request;
    }

    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Галерея';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Gallery);

        $grid->column('id', 'Идентификатор');
        $grid->column('image', 'Изображение');
        $grid->column('created_at', 'Время создания');
        $grid->column('updated_at', 'Время обновления');

        return $grid;
    }

    /**
     * Make a show builder.
     *
     * @param mixed $id
     * @return Show
     */
    protected function detail($id)
    {
        $show = new Show(Gallery::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('image', 'Изображение');
        $show->field('created_at', 'Время создания');
        $show->field('updated_at', 'Время обновления');

        return $show;
    }

    public function edit($id, Content $content)
    {
        return $content
            ->header('Редактирование')
            ->description('')
            ->body($this->form(true, $id)->edit($id));
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form($editing=false)
    {
        $form = new Form(new Gallery);

        $form->image('image', 'Изображение');

        $form->saving(function($form) use ($editing){
            if ($editing) {
                $this->googleDrive->deleteFileById($form->image);
            }
        });

        $form->saved(function (Form $form) {
            $this->googleDrive->storeFileOnAdminSaving('gallery_images',
                $form->image,
                Gallery::class,
                $form->model()->id,
                'image'
            );
            \Cache::flush();
        });

        return $form;
    }

}
