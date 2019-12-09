<?php

namespace App\Admin\Controllers;

use App\Models\Menu;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class MenusController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Навигация';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Menu);

        $grid->column('id', 'Идентификатор');
        $grid->column('ru_name', 'Название');
        $grid->column('slug','Элемент URL');
        $grid->column('order', 'Порядковый номер');
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
        $show = new Show(Menu::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('ru_name', 'Название');
        $show->field('slug', 'Элемент URL');
        $show->field('order', 'Порядковый номер');
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
        $form = new Form(new Menu);

        $form->text('slug', 'Элемент URL')->placeholder('http://app.com/...');
        $form->number('order', 'Порядок')->default(0);
        $form->tab('RU', function(Form $form){
            $form->text('ru_name', 'Название (рус.)');
        })->tab('UA', function(Form $form) {
            $form->text('ua_name', 'Название (укр.)');
        });
        return $form;
    }
}
