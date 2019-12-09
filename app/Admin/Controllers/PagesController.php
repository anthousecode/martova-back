<?php

namespace App\Admin\Controllers;

use App\Models\Page;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class PagesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Кастомизируемые Страницы';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Page);

        $grid->column('id', 'Идентификатор');
        $grid->column('slug', 'Элемент URL');
        $grid->column('ru_title', 'Заголовок');
        $grid->column('ru_meta_description', 'Описание');
        $grid->column('ru_content', 'Контент');
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
        $show = new Show(Page::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('slug', 'Элемент URL');
        $show->field('ru_title', 'Заголовок');
        $show->field('ru_meta_description', 'Описание');
        $show->field('ru_content', 'Контент');
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
        $form = new Form(new Page);

        $form->text('slug', 'Элемент URL');
        $form->tab('RU', function(Form $form){
            $form->text('ru_title', 'Заголовок (рус.)');
            $form->text('ru_meta_description', 'Описание (рус.)');
            $form->ckeditor('ru_content', 'Контент (рус.)');
        })->tab('UA', function(Form $form){
            $form->text('ua_title', 'Заголовок (укр.)');
            $form->text('ua_meta_description', 'Описание (укр.)');
            $form->ckeditor('ua_content', 'Контент (укр.)');
        });

        return $form;
    }
}
