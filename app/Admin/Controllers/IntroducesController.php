<?php

namespace App\Admin\Controllers;

use App\Models\Introduce;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class IntroducesController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = '描述';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Introduce());
        $grid->column('id', __('ID'));
        $grid->column('description', __('描述'));
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
        $show = new Show(Introduce::findOrFail($id));
        $show->field('description', __('描述'))->unescape();
        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Introduce());
        $form->UEditor('description', __('描述'));

        return $form;
    }
}
