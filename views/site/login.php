<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Login';
$this->params['breadcrumbs'][] = $this->title;
?>

<h1>Вход пользователя</h1>
<br>
<br>
<h3>Для входа введите логин и пароль</h3>
<fieldset style="width:280px; display:block; margin: 0 auto; background-color: #EEEEEE;">
    <legend> <b> Вход пользователя </b> </legend>
    <?php $form = ActiveForm::begin([
        'id' => 'login-form',
    ]); ?>
        <table align="center" cellpadding="5" bgcolor="#EEEEEE">
            <tbody>
            <tr style="text-align: right;">
                <td>Логин:</td>
                <td>
                    <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label(false) ?>
                </td>
            </tr>
            <tr>
                <td>Пароль:</td>
                <td>
                    <?= $form->field($model, 'password')->passwordInput()->label(false) ?>
                </td>
            </tr>
            <tr style="text-align: right;">
                <td colspan="2">
                    <input type="submit" value="Вход">
                </td>
            </tr>
            </tbody>
        </table>
    <?php ActiveForm::end(); ?>
</fieldset>
<br>
<br>
<center class="fcBlue">Если Вы страдаете потерей памяти, <br>то воспользуйтесь <a href="users/remind/">системой восстановления пароля</a><br>или <a href="users/register/">зарегистрируйтесь</a>.</center>
<br>
<br>


<!--<div class="site-login">
    <h1><?/*= Html::encode($this->title) */?></h1>

    <p>Please fill out the following fields to login:</p>

    <?php /*$form = ActiveForm::begin([
        'id' => 'login-form',
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); */?>

        <?/*= $form->field($model, 'username')->textInput(['autofocus' => true]) */?>

        <?/*= $form->field($model, 'password')->passwordInput() */?>

        <?/*= $form->field($model, 'rememberMe')->checkbox([
            'template' => "<div class=\"col-lg-offset-1 col-lg-3\">{input} {label}</div>\n<div class=\"col-lg-8\">{error}</div>",
        ]) */?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?/*= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) */?>
            </div>
        </div>

    <?php /*ActiveForm::end(); */?>

    <div class="col-lg-offset-1" style="color:#999;">
        You may login with <strong>admin/admin</strong> or <strong>demo/demo</strong>.<br>
        To modify the username/password, please check out the code <code>app\models\User::$users</code>.
    </div>
</div>-->
