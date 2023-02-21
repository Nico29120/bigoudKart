<div class="register-box">
    <form name="formRegister" method="POST" action="/bigoudkart/register" onsubmit = "return validateRegisterForm()">
        
        <div class="form-box">
            <input type="text"  name="username" id="username" required/>
            <label for="username">Pseudo</label>
        </div>
        
        <div class="form-box">
            <input type="password"  name="password" id="password" required/>
            <label for="password">Mot de passe</label>
        </div>
        
        <div class="form-box">
            <input type="email"  name="mail" id="mail" pattern="/^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/" required/>
            <label for="mail">Email</label>
        </div>
        
        <input id="register-submit" type="submit" name="send" value="Envoyer" />
        
    </form>
</div>