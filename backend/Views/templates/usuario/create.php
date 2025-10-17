<div>sou o create</div>
<form action="/backend/usuarios/salvar" method="post"></form>
<label for="text"> nome</label>
<input type="text" name="nome_usuario" id="nome_usuario"/>
<br/>
<label for="email"> email</label>
<input type="email" name="email_usuario" id="email_usuario"/>
<br/>
<label for="Senha"> senha</label>
<input type="password" name="senha_usuario" id="senha_usuario"/>
<br/>
<label for="Tipo">tipo</label>
<select name="tipo_usuario" id="tipo_usuario">
    <option value="admin">admin</option>
    <option value="user">user</option>
</select>
<br/>
<button type="submit">Salvar</button>
</form>
