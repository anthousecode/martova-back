<?php

namespace App\Admin\Controllers;

use App\Models\Infrastructure;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\CategoryInfrastructure;
use Illuminate\Http\Request;
use App\Services\Cloud\GoogleDrive;

class InfrastructureController extends AdminController
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
    protected $title = 'Инфраструктура';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Infrastructure);

        $grid->column('id', 'Идентификатор');
        $grid->column('category.ru_name', 'Категория');
        $grid->column('image', '3D изображение');
        $grid->column('X', 'Расположение по оси X');
        $grid->column('Y', 'Расположение по оси Y');
        $grid->column('ru_name', 'Название');
        $grid->column('ru_description', 'Описание');
        $grid->column('icon', 'Иконка');
        $grid->column('timing', 'Время');
        $grid->column('video', 'Видео');
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
        $show = new Show(Infrastructure::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('category', 'Категория')->as(function ($default) {
            return $default ? $default->ru_name : '-';
        });
        $show->field('image', '3D изображение');
        $show->field('X', 'Расположение по оси X');
        $show->field('Y', 'Расположение по оси Y');
        $show->field('ru_name', 'Название');
        $show->field('ru_description', 'Описание');
        $show->field('icon', 'Иконка');
        $show->field('timing', 'Время');
        $show->field('video', 'Видео');
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
        $form = new Form(new Infrastructure);

        $form->select('category_id', 'Категория объекта инфраструктуры')
            ->options(CategoryInfrastructure::all()->pluck('ru_name', 'id'));
        $form->image('image', '3D изображение');
        $form->number('X', 'Расположение по оси X');
        $form->number('Y', 'Расположение по оси Y');
        $form->icon('icon', 'Иконка');
        $form->time('time', 'Время');
        $form->file('video', 'Видео');
        $form->tab('RU', function(Form $form){
            $form->text('ru_name', 'Название');
            $form->ckeditor('ru_description', 'Описание');
        })->tab('UA', function(Form $form) {
            $form->text('ua_name', 'Название');
            $form->ckeditor('ua_description', 'Описание');
        });

        $form->ignore(['image', 'video']);

        $form->saved(function($form){
            $this->googleDrive->storeFileOnAdminSaving('infrastructure_3d_images',
                $this->request->file('image'),
                Infrastructure::class,
                $form->model()->id,
                'image'
            );
            $this->googleDrive->storeFileOnAdminSaving('infrastructure_videos',
                $this->request->file('video'),
                Infrastructure::class,
                $form->model()->id,
                'video'
            );
        });

        return $form;
    }
}
