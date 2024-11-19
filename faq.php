<?php
include_once("process/conn.php"); 
include_once("templates/header.php"); 
?>


    <section class="faq001
    ">
        <div class="faq-container">
            <h1>FAQ - Delicatto</h1>
            <ul>
                <li onclick="toggleAnswer(this)">
                    1. Os preços variam conforme o sabor ou tipo de recheio?
                    <div class="answer">
                        <p>Os preços dos nossos produtos variam de acordo com o peso, tipo de recheio e outros detalhes personalizados que você escolher não vão alterar nos preços.</p>
                    </div>
                </li>
                <li onclick="toggleAnswer(this)">
                    2. Posso retirar meu pedido na loja?
                    <div class="answer">
                        <p>Sim, você pode retirar seu pedido diretamente na nossa loja. Basta informar a data e o horário preferido durante o processo de encomenda.</p>
                    </div>
                </li>
                <li onclick="toggleAnswer(this)">
                    3. Posso fazer degustação antes de fechar uma encomenda de bolo?
                    <div class="answer">
                        <p>Sim, oferecemos degustações para que você experimente alguns sabores antes de fechar sua encomenda de bolo personalizado. Entre em contato conosco para agendar uma data e horário.
                        </p>
                    </div>
                </li>
                <li onclick="toggleAnswer(this)">
                    4. Com quanto tempo de antecedência preciso fazer uma encomenda de bolo personalizado?
                    <div class="answer">
                        <p>Recomendamos que a encomenda de bolos personalizados seja feita com pelo menos 48 horas de antecedência para garantir que possamos atender todas as especificações desejadas.
                        </p>
                    </div>
                </li>
                <li onclick="toggleAnswer(this)">
                    5. Quais são os métodos de pagamento aceitos?
                    <div class="answer">
                        <p>Aceitamos pagamento em dinheiro, cartões de crédito e débito e transferências bancárias.
                        </p>
                    </div>
                </li>
                <li onclick="toggleAnswer(this)">
                    6. Os salgados são feitos diariamente?
                    <div class="answer">
                        <p>Sim, nossos salgados são preparados diariamente para garantir frescor e qualidade.
                        </p>
                    </div>
                </li>
                <li onclick="toggleAnswer(this)">
                    7. Vocês têm opções de bolos para dietas específicas, como sem glúten, sem lactose ou veganos?
                    <div class="answer">
                        <p>Sim, temos opções de bolos adaptados para dietas específicas, incluindo versões sem glúten, sem lactose e veganas.</p>
                    </div>
                </li>
            </ul>
        </div>
    </section>

    <?php
    include_once('templates/footer.php');
    ?>



    