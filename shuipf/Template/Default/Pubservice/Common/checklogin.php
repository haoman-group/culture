<div class="modal fade" role="dialog" id="login" aria-labelledby="gridSystemModalLabel">
        <div class="modal-dialog" role="document" style="margin-top: 15%;" >
          <div class="modal-content" style="width: 525px;height: 350px;">
            <div class="modal-header" style="background-color: #93262B;">
              <button type="button" class="close" data-dismiss="modal" aria-label="Close" style="color: #fff;"><span aria-hidden="true" style="color: #fff;">&times;</span></button>
              <h4 class="modal-title" id="gridSystemModalLabel" style="color: #fff;">文化公共服务平台</h4>
            </div>
            <div class="modal-body">
              <div class="container-fluid">
                <form action="{:U('Pubservice/Index/doLogin',array('tablname'=>'pubservice-login'))}" method="post">
                  <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px;">
                      <div class="input-group margin-bottom-sm">
                        <span class="input-group-addon"><i class="fa fa-envelope-o fa-fw"></i></span>
                        <input class="form-control input-lg" type="text" name="username" placeholder="用户名">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-12" style="margin-bottom: 20px;">
                      <div class="input-group">
                        <span class="input-group-addon"><i class="fa fa-key fa-fw"></i></span>
                        <input class="form-control input-lg" type="password" name="password" placeholder="密码">
                        <input type="hidden" name="type" value="normal">
                        <input type="hidden" name="id" value="{$_GET['id']}">
                        <input type="hidden" name="typename" value="{$_GET['type']}">
                        <input type="hidden" name="tablename" value="index">
                        <input type="hidden" name="url" value="{$_SERVER['REQUEST_URI']}">
                      </div>
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-9" style="margin-bottom: 10px;">
                      <label>
                        <input type="checkbox"> 记住账号
                      </label>
                    </div>
                    <div class="col-md-3" style="margin-bottom: 10px;">
                      <label>
                        <a href="#">登陆遇到问题</a>
                      </label>
                    </div>
                  </div>
                  <input type="submit" class="btn btn-primary  btn-lg btn-block" style="margin-bottom: 20px;" value="登录">
                  <div class="row">
                    <div class="col-md-12" style="margin-bottom: 10px;">
                      <div class="pull-right">
                        <label>
                          <a href="{:U('Member/Index/register',array('type'=>'pubservice-register'))}">立即注册</a>
                        </label>
                      </div>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
      </div>