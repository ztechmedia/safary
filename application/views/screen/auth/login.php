<div class="login-title"><strong>Selamat Datang</strong></div>

<form class="form-horizontal auth-action" 
    data-url="<?=base_url('check-login')?>" 
    data-btnclass=".login-btn"
    data-btnname="Login">

    <div class="form-group">
        <div class="col-md-12">
            <input value="admin@admin.com" name="email" id="email" type="email" class="form-control" placeholder="E-mail" />
            <span class="help-block form-error" id="email-error"><span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-12">
            <input value="123456" name="password" id="password" type="password" class="form-control" placeholder="Password" />
            <span class="help-block form-error" id="password-error"><span>
        </div>
    </div>

    <div class="form-group">
        <div class="col-md-6">
        </div>
        <div class="col-md-6">
            <button class="btn btn-info btn-block login-btn" type="submit">Login</button>
        </div>
    </div>
</form>