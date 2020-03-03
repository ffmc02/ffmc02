<div class="titleGreen">  
    <h2>inscription</h2>
</div>
<div>
    <p><?= isset($addUserMessage) ? $addUserMessage : '' ?></p>
    <p><?= isset($formError['register']) ? $formError['register'] : '' ?></p>
    <form method="POST" action="#"> 
        <label for="pseudo">Votre pseudo:</label>
        <input type="text" placeholder="Votre pseudo" name="pseudo" id="pseudo" value=""/>
        <p><?= isset($formError['pseudo']) ? $formError['pseudo'] : '' ?></p> 
        <label for="email">Votre mail:</label>
        <input type="text" placeholder="Votre mail" name="email" id="email" value="" />
        <p><?= isset($formError['email']) ? $formError['email'] : '' ?></p>
        <label for="password">Votre mot de passe:</label>
        <input type="password" placeholder="Votre mot de passe" name="password" id="password" />
        <p><?= isset($formError['password']) ? $formError['password'] : '' ?></p>
        <label for="password2">Confirmation du mot de passe:</label>
        <input type="password" placeholder="Confirmation de votre MDP" name="confirmPassword" id="password2" />
        <p><?= isset($formError['confirmPassword']) ? $formError['confirmPassword'] : '' ?></p>
        <input type="submit" name="registration" value="je m'inscris" />
    </form>
</div>