<?php foreach($usuario as $usuario); ?>
<form action="/backend/usuarios/atualizar/ <?php echo $usuario['id_usuario'];?>" method="post" enctype="multipart/form-data"></form>
<label for="text"> nome</label>
<input type="text" name="nome_usuario" id="nome_usuario" value="<?php echo $usuario['nome_usuario'];?>"/>
<br/>
<label for="email"> email</label>
<input type="email" name="email_usuario" id="email_usuario" value="<?php echo $usuario['email_usuario'];?>"/>
<br/>
<label for="Senha"> senha</label>
<input type="password" name="senha_usuario" id="senha_usuario"/>
<br/>
<label for="Tipo">tipo</label>
<select name="tipo_usuario" id="tipo_usuario" value="<?php echo $usuario['tipo_usuario'];?>"></select>
    <option value="admin">admin</option>
    <option value="user">user</option>
</select>
<br/>
<label for="imagem">imagem</label>
<input type="file" nome="imagem" id="imagem" accept="imagem/*">
<button type="submit">Salvar</button>
</form>
