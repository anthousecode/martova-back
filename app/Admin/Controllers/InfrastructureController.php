<?php

namespace App\Admin\Controllers;

use App\Models\Infrastructure;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\CategoryInfrastructure;

class InfrastructureController extends AdminController
{
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
        $grid->column('ru_name', 'Название');
        $grid->column('ru_description', 'Описание');
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
        });;
        $show->field('ru_name', 'Название');
        $show->field('ru_description', 'Описание');
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

        $form->tab('RU', function(Form $form){
            $form->text('ru_name', 'Название');
            $form->ckeditor('ru_description', 'Описание');
        })->tab('UA', function(Form $form) {
            $form->text('ua_name', 'Название');
            $form->ckeditor('ua_description', 'Описание');
        });
        return $form;
    }
}
