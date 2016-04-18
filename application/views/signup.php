<div class="login">
    <?php echo form_open_multipart('Authentication/register'); ?>
        Username: <input type="text" name="username">
        <br>
        Password: <input type="password" name="password">
        <br>
        <input type='file' name='userfile' size='20'/>
        <div style="text-align:center">
            <input type="submit" value="Register">
        </div>
    </form>
</div>