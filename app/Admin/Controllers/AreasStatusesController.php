<?php

namespace App\Admin\Controllers;

use App\Models\AreaStatus;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class AreasStatusesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Статусы Участков';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new AreaStatus);

        $grid->column('id', 'Идентификатор');
        $grid->column('ru_name', 'Название');
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
        $show = new Show(AreaStatus::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('ru_name', 'Название');
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
        $form = new Form(new AreaStatus);

        $form->tab('RU', function(Form $form) {
            $form->text('ru_name', 'Название (рус.)');
        })->tab('UA', function(Form $form) {
            $form->text('ua_name', 'Название (укр.)');
        });

        return $form;
    }
}
