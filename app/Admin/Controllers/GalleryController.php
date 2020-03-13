<?php

namespace App\Admin\Controllers;

use App\Models\Gallery;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use File;
use Illuminate\Http\Request;

class GalleryController extends AdminController
{
    protected $request;

    public function __construct(Request $request)
    {
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
        $grid->column('image', 'Изображение')/*->display(function($image){
            return  sprintf("<img style='width: 100px; height: 100px; display: block' src='https://drive.google.com/uc?id=%s&export=download' alt='...'>", $image);
        })*/;
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

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Gallery);

        $form->image('image', 'Изображение');

        $form->saving(function ($form) {
            try {
                if ($form->model()->image) {
                    \MediaManager::deleteFile($form->model()->image);
                }
            } catch (\Exception $e) {
                report(\Carbon\Carbon::now()->toDateTimeString() . ': ' . $e->getMessage());
            }
        });

        $form->saved(function (Form $form) {
            \MediaManager::storeFileOnAdminSaving('gallery_images',
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
