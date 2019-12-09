<?php

namespace App\Admin\Controllers;

use App\Models\Area;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;
use App\Models\AreaStatus;
use Illuminate\Database\QueryException;

class AreasController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Участки';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Area);

        $grid->column('id', 'Идентификатор');
        $grid->column('status.ru_name', 'Статус');
        $grid->column('number', 'Номер');
        $grid->column('square', 'Площадь');
        $grid->column('price', 'Цена');
        $grid->column('image', 'Изображение');
        $grid->column('plan', 'Кадастровый план');
        $grid->column('survey', 'Геодезическая съемка');
        $grid->column('color', 'Цвет');
        $grid->column('default_color', 'Цвет по умолчанию');
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
        $show = new Show(Area::findOrFail($id));

        $show->field('id', 'Идентификатор');
        $show->field('status', 'Статус')->as(function ($default) {
            return $default ? $default->ru_name : '-';
        });
        $show->field('number', 'Номер');
        $show->field('square', 'Площадь');
        $show->field('price', 'Цена');
        $show->field('image', 'Изображение');
        $show->field('plan', 'Кадастровый план');
        $show->field('survey', 'Геодезическая съемка');
        $show->field('color', 'Цвет');
        $show->field('default_color', 'Цвет по умолчанию');
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
            $form = new Form(new Area);
            $form->select('status_id', 'Статус Участка')
                ->options(AreaStatus::all()->pluck('ru_name', 'id'));
            $form->text('number', 'Номер');
            $form->decimal('square', 'Площадь');
            $form->decimal('price', 'Цена');
            $form->image('image', 'Изображение');
            $form->file('plan', 'Кадастровый план (XML)')->rules('mimes:xml,txt');
            $form->file('survey', 'Геодезическая съемка (PDF/DWG)')->rules('mimes:pdf,dwg');
            $form->color('color', 'Цвет');
            $form->select('default_color', 'Цвета по умолчанию')
            ->options([
                "red" => "Красный",
                "green" => "Зеленый",
                "brown" => "Коричневый",
                "blue" => "Голубой",
                "yellow" => "Желтый",
            ]);
        return $form;
    }
}
