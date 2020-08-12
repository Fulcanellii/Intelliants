<?php

namespace App\Admin\Controllers;

use App\Company;
use Encore\Admin\Controllers\AdminController;
use Encore\Admin\Form;
use Encore\Admin\Grid;
use Encore\Admin\Show;

class CompanyController extends AdminController
{
    /**
     * Title for current resource.
     *
     * @var string
     */
    protected $title = 'Company';

    /**
     * Make a grid builder.
     *
     * @return Grid
     */
    protected function grid()
    {
        $grid = new Grid(new Company());

        $grid->column('id', ('Id'));
        $grid->column('title', ('Title'));
        $grid->column('date', ('Date'));
        $grid->column('status', ('Status'));
        $grid->column('created_at', ('Created at'));
        $grid->column('updated_at', ('Updated at'));

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
        $show = new Show(Company::findOrFail($id));

        $show->field('id', ('Id'));
        $show->field('title', ('Title'));
        $show->field('description', ('Description'));
        $show->field('date', ('Date'));
        $show->field('status', ('Status'));
        $show->field('created_at', ('Created at'));
        $show->field('updated_at', ('Updated at'));

        return $show;
    }

    /**
     * Make a form builder.
     *
     * @return Form
     */
    protected function form()
    {
        $form = new Form(new Company());

        $form->text('title', ('Title'));
        $form->textarea('description', ('Description'));
        $form->date('date', ('Date'))->default(date('Y-m-d'));
        $form->switch('status', ('Status'));

        return $form;
    }
}
