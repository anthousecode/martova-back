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
    protected $title = 'App\Models\Infrastructure';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Infrastructure);

        $grid->column('id', __('Id'));
        $grid->column('category.name', __('Category'));
        $grid->column('name', __('Name'));
        $grid->column('description', __('Description'));
        $grid->column('created_at', __('Created at'));
        $grid->column('updated_at', __('Updated at'));

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

        $show->field('id', __('Id'));
        $show->field('category', __('Category'))->as(function ($default) {
            return $default ? $default->name : '-';
        });;
        $show->field('name', __('Name'));
        $show->field('description', __('Description'));
        $show->field('created_at', __('Created at'));
        $show->field('updated_at', __('Updated at'));

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
            $form->text('ru_name', __('Name'));
            $form->ckeditor('ru_description', __('Description'));
        })->tab('UA', function(Form $form) {
            $form->text('ua_name', __('Name'));
            $form->ckeditor('ua_description', __('Description'));
        });
        return $form;
    }
}
