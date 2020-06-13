<h1>接下来是数据库的配置:</h1>
<p>下面的配置之中，认真填写正确，否则可能会导致数据库连接不成功或者数据库数据丢失。
    如果失败，请重新安装。</p>
<h2>请填写正确一下信息</h2>
<p>填写的账号权限应该拥有增删数据库的能力，否则可能造成错误。
填写之后我们将新建一个数据库用来存储信息，请确保没有重名数据库，否则可能造成数据丢失。</p>
<form id="setup" method="post" novalidate="novalidate">
    <table class="form-table" role="presentation">
        <tr>
            <th scope="row"><label for="weblog_title">数据库的地址</label></th>
            <td><input name="sql_ip" type="text" id="weblog_title" size="25" value="<?= isset($_POST['sql_ip']) ? $_POST['sql_ip'] : 'localhost' ?>"/>
                <p>可以是本机地址或者外网数据库ip，请确保可以连接</p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="user_login">库名</label></th>
            <td>
                <input name="sql_name" type="text" id="user_login" size="25" value="<?= isset($_POST['sql_name']) ? $_POST['sql_name'] : 'yii2advancedtest' ?>"/>
                <p>我们的数据表格所要使用的库，请保证你所填的库中数据没有他用，否则会导致数据丢失。</p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="user_login">用户名</label></th>
            <td>
                <input name="sql_account" type="text" id="user_login" size="25" value="<?= isset($_POST['sql_account']) ? $_POST['sql_account'] : 'root' ?>"/>
                <p>连接数据库使用的账号</p>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="user_login">密码</label></th>
            <td>
                <input name="sql_password" type="password" id="user_login" size="25" value="<?= isset($_POST['sql_password']) ? $_POST['sql_password'] : '' ?>"/>
                <p>账号密码</p>
                <input name="admin_password" style="display:none" type="password" id="user_login" size="25" value="<?=$_POST['admin_password']?>"/>
            </td>
        </tr>
        <tr>
            <th scope="row"><label for="user_login">安装模式</label></th>
            <td>
        <label><input name="chose" type="radio" value="sample"/>简洁 </label>
        <label><input name="chose" type="radio" value="complete" checked/>完整 </label>
                <p>简洁版我们将导入少量数据，表格基本为空，用于从头开始使用本项目进行社区管理的人。</p>
                <p>完整版我们将导入大量随机生成数据，用于演示网站的最佳显示模式。</p>
            </td>
        </tr>
    </table>
    <p class="step"><input type="submit" id='submit' class="button button-large" value="确认连接"/></p>
</form>