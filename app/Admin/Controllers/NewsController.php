<?php

namespace App\Admin\Controllers;

use App\Models\News;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class NewsController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Новости';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new News);

        $grid->column('id', 'Идентификатор');
        $grid->column('ru_name', 'Название');
        $grid->column('ru_description', 'Описание');
        $grid->column('image', 'Изображение');
        $grid->column('created_at', 'Дата создания');
        $grid->column('updated_at', 'Дата обновления');

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
        $show = new Show(News::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('ru_name', 'Название');
        $show->field('ru_description', 'Описание');
        $show->field('image', 'Изображение');
        $show->field('created_at', 'Дата создания');
        $show->field('updated_at', 'Дата обновления');

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
            $form = new Form(new News);

            $form->image('image', 'Изображение');

            $form->tab('RU', function (Form $form) {
                $form->text('ru_name', 'Название (рус.)');
                $form->ckeditor('ru_description', 'Описание (рус.)');
            })->tab('UA', function (Form $form) {
                $form->text('ua_name', 'Название (укр.)');
                $form->ckeditor('ua_description', 'Описание (укр.)');
            });

            return $form;
    }
}
