<?php
include_once('templates/header.php');
?>
 
 <!-- Main Content -->
 <main class="contact-section">
        <div class="form-container">
            <h2>Fale Conosco</h2>
            
            <?php
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
                $nome = htmlspecialchars($_POST["name"]);
                $email = htmlspecialchars($_POST["email"]);
                $assunto = htmlspecialchars($_POST["subject"]);
                $mensagem = htmlspecialchars($_POST["message"]);
                
                // Aqui você pode adicionar a lógica de envio do e-mail ou salvar os dados em um banco de dados
                echo "<p class='success-message'>Obrigado, $nome! Sua mensagem foi enviada com sucesso.</p>";
            }
            ?>

            <form action="" method="post" class="contact-form">
                <label for="name">Nome</label>
                <input type="text" id="name" name="name" required>

                <label for="email">E-mail</label>
                <input type="email" id="email" name="email" required>

                <label for="subject">Assunto</label>
                <input type="text" id="subject" name="subject" required>

                <label for="message">Mensagem/Sugestão</label>
                <textarea id="message" name="message" rows="5" required></textarea>

                <button type="submit">Enviar Mensagem</button>
            </form>
        </div>
    </main>
<?php
include_once('templates/footer.php');
?>