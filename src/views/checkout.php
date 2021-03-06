<?php
require_once('../db/conexao.php');
$conexao = conexaoMysql();
$msg = '';

?>

<!DOCTYPE html>
<html lang="pt-br">
    <link rel="shortcut icon" href="../../public/assets/icons/coin.ico">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Geek Coins - Pagamento</title>

    <link href="../../public/css/global.css" rel="stylesheet"/>
    <link href="../../public/css/checkout.css" rel="stylesheet"/>
    <link href="../../public/css/palette.css" rel="stylesheet"/>

</head>
<body>
    
    <div class="container center">

        <header class="center">
            <a href="index.html" class="logo">
                <img src="../../public/assets/icons/logo-horizontal.svg" alt="Logotipo Geek Coins">
            </a>

            <div id="container-search">
                <form role="search" id="form-search" action="search.php" method="GET">
                    <button type="submit" id="button-search"><img src="../../public/assets/icons/search-solid.svg" alt="ícone de lupa" id="icon-search"></button>
                    <input type="search" incremental="incremental" name="search" id="bar-search" placeholder="Pesquisar...">                        
                </form>
            
                <a href="#" id="anchor-login" class="cinza-escuro">Entre ou cadastre-se</a>
                
                <div id="container-icons">
                    <a href="#" class="button-icons">
                        <img src="../../public/assets/icons/favoritos.svg" alt="ícone de coração" id="icon-wishlist">
                    </a>
                    <a href="#" class="button-icons">
                        <img src="../../public/assets/icons/sacola.svg" alt="ícone de sacola de compras" id="icon-shopping">
                    </a>
                </div>                        
            </div>
        </header>

        <div id="page-title" class="center">
            <h1 class="cinza-escuro">Finalizar compra</h1>
        </div>

        <main class="center">
            
            <div id="column-1">
                <div id="container-form">
                    <div id="personal-data" class="register">
                        <div class="form-register-title">
                            <img class="icon" src="../../public/assets/icons/pessoa.svg" alt="ícone de usuário">
                            <p class="cinza-medio">Dados Pessoais</p>
                            <img class="arrow" src="../../public/assets/icons/angle-up-solid.svg" alt="Recolher">
                        </div>
                        <form id="data-info" class="register-info" method="POST">
                            <label for="email">
                                <input type="email" name="email" size="32" placeholder="nome@mail.com">
                            </label>

                            <label for="nome">
                                <input type="name" name="nome" size="32" placeholder="Nome completo">
                            </label>
                                
                            <label for="telefone">
                                <input type="text" name="telefone" size="32" placeholder="(XX) 0000-0000">
                            </label>

                            <input type="submit" id="submit-form" hidden/>
                        </form>
                    </div>
                    
                    <div id="address" class="register">
                        <div class="form-register-title">
                            <img id="truck" src="../../public/assets/icons/entrega.svg" alt="ícone de caminhão">
                            <p class="cinza-medio">Entrega</p>
                            <img class="arrow" src="../../public/assets/icons/angle-up-solid.svg" alt="Recolher">
                        </div>

                        <form id="delivery-info" class="register-info" action="checkout.php" method="POST">
                    
                            <label for="cep">
                                <input type="text" name="cep" size="10" maxlength="9" placeholder="CEP" id="cep"
                                    onblur="searchcep(this.value);"/>
                            </label>
                            
                            <label for="logradouro">
                                <input type="text" name="logradouro" size="38" placeholder="Rua" id="rua">
                            </label>
                        
                            <label for="numero">
                                <input type="text" name="numero" size="8" placeholder="Número">
                            </label>
                        
                            <label for="complemento">
                                <input type="text" name="complemento" size="10" placeholder="Complemento">
                            </label>
                              
                            <label for="referencia">
                                <input type="text" name="referencia" size="24" placeholder="Referência">
                            </label>

                            <label for="bairro">
                                <input type="text" name="bairro" size="22" placeholder="Bairro" id="bairro">
                            </label>
                        
                            <label for="cidade">
                                <input type="text" name="cidade" size="15" placeholder="Cidade" id="cidade">
                            </label>
                                    
                            <label for="estado">
                                <input type="text" name="estado" size="2" placeholder="UF" id="uf">
                            </label>
                            
                            <label for="submit-form">
                                <input type="submit" hidden/>
                            </label>
                        </form>
                    </div>
                </div>

                <div id="payment">
                    <div class="form-register-title">
                        <img id="wallet" src="../../public/assets/icons/carteira-amarela.svg" alt="ícone de carteira">
                        <p id="title" class="cinza-escuro">Pagamento</p>
                        <img class="arrow" src="../../public/assets/icons/angle-up-solid.svg" alt="Recolher">
                    </div>

                    <div id="payment-type">
                        <div id="buttons">
                            <button id="boleto" class="options" onclick="currentDiv(1)">
                                <img src="../../public/assets/icons/boleto.svg" alt="Pagar com boleto">
                                <p class="text cinza-medio">Boleto</p>
                            </button>
                            <button class="options" onclick="currentDiv(2)">
                                <img src="../../public/assets/icons/cartao.svg" alt="Pagar com boleto">
                                <p class="text cinza-medio">Cartão</p>
                            </button>
                            <button class="options" onclick="currentDiv(3)">
                                <img src="../../public/assets/icons/dinheiro-geek.svg" alt="Pagar com boleto">
                                <p class="text cinza-medio">Cupom</p>
                            </button>
                        </div>

                        <div class="description">
                            <div id="description-boleto" class="myCheckout">
                                <p class="text cinza-medio">O boleto bancário será enviado por e-mail 
                                    após a confirmação da compra, e poderá ser 
                                    pago em qualquer banco até a data de vencimento.
                                </p>
    
                                <label for="submit-form" tabindex="0">
                                    <button onclick="finalizar();">
                                        <p>Finalizar compra</p>
                                    </button>
                                </label>
                            </div>
                            
                            <div id="description-cartao" class="myCheckout">
                                <div id="creditcard-info">
                                    <input id="cartao" type="number" size= "16" placeholder="Número do cartão">
                                    <input id="validade" type="number" size= "5" placeholder="Data de validade">
                                    <input id="cvv" type="number" size="4" placeholder="CVV">    
                                </div>
                                
                                <div id="card-type">
                                    <div class="radio-option">
                                        <input type="radio" id="credit" name="card-type" value="credit">
                                        <label class="radio-label" for="credit">Cartão de crédito</label>   
                                    </div>
                                    
                                    <div class="radio-option">
                                        <input type="radio" id="debit" name="card-type" value="debit">
                                        <label class="radio-label" for="debit">Cartão de débito</label>
                                    </div>
                                </div>
    
                                <label for="submit-form" tabindex="0">
                                    <button onclick="finalizar();">
                                        <p>Finalizar compra</p>
                                    </button>
                                </label>
                            </div>

                            <div id="description-cupom" class="myCheckout">
                                <input type="text" placeholder="Digite o código do cupom">

                                <p class="text cinza-medio">Cada cupom pode ser usado apenas uma única vez por CPF.
                                </p>
                                
                                <div class="total">
                                    <p class="cinza-escuro">desconto:</p>
                                    <p class="laranja-escuro">R$ 0,00</p>
                                </div>
    
                                <label for="submit-form" tabindex="0">
                                    <button onclick="finalizar();">
                                        <p>Finalizar compra</p>
                                    </button>
                                </label>
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
                <?php if ($msg): ?>
                <p><?=$msg?></p>
                <?php endif; ?>    
            </div>

            <div id="column-2">
                <div id="resume">
                    <div id="values" class="resume-values">
                        <p class="cinza-medio">subtotal</p>
                        <p class="cinza-medio">frete</p>
                        <p class="cinza-medio">descontos</p>
                        <p class="cinza-escuro main">total</p>
                    </div>
                    <div id="prices" class="resume-values">
                        <p class="cinza-medio" id="subtotal">R$ 76,99</p>
                        <p class="cinza-medio" id="frete">R$ 16,79</p>
                        <p class="cinza-medio">R$ 0,00</p>
                        <p id="total" class="laranja-escuro main">R$ 93,78</p>
                    </div>
                </div>
                
                <div id="resume-products">

                    <div id="division-line"></div>

                    <div id="products">
                        <h1>Pedido</h1>
                        <div class="item" id="1">
                            <div class="preview">
                                <img class="product-image" src="../../public/assets/images/caneca-ichigo-hollow-lados.png" alt="Produto">
                                <button class="trash-button">
                                    <img class="delete" src="../../public/assets/icons/trash-alt-regular.svg" alt="Remover produto">
                                </button>                             
                            </div>
                            <div class="product-info">
                                <p class="name">Caneca Ichigo - Coleção Bleach</p>
                                <div class="quantity">
                                    <img class="measure" onclick="reduce(this.parentElement.parentElement.parentElement)" src="../../public/assets/icons/minus-solid.svg" alt="Diminuir">
                                    <input class="total" type="number" value="1">
                                    <img class="measure" onclick="add(this.parentElement.parentElement.parentElement)" src="../../public/assets/icons/plus-solid.svg" alt="Aumentar">
                                </div>
                                <p class="price" id="price1">R$ 36,99</p>
                                <?php
                                    $sql = "SELECT preco_unitario
                                            FROM produto  WHERE idproduto=2";

                                    if($select = mysqli_query($conexao, $sql)){


                                        while($rsProduto = mysqli_fetch_array($select)){
                                ?>
                                <p hidden><?php echo($rsProduto['preco_unitario']) ?></p>
                                <?php            
                                    } 
                                }
                                ?>
                            </div>
                            
                        </div>

                        <div class="item" id="2">
                            <div class="preview">
                                <img class="product-image" src="../../public/assets/images/mousepad-league-of-legends.png" alt="Produto">
                                <button class="trash-button">
                                    <img class="delete" src="../../public/assets/icons/trash-alt-regular.svg" alt="Remover produto">
                                </button> 
                            </div>

                            <div class="product-info">
                                <p class="name">Mousepad League of Legends</p>
                                <div class="quantity" id="2">
                                    <img class="measure" onclick="reduce(this.parentElement.parentElement.parentElement)" src="../../public/assets/icons/minus-solid.svg" alt="Diminuir">
                                    <input class="total" type="number" value="1">
                                    <img class="measure" onclick="add(this.parentElement.parentElement.parentElement)" src="../../public/assets/icons/plus-solid.svg" alt="Aumentar">
                                </div>
                                <p class="price" id="price2">R$ 39,99</p>
                                <?php
                                    $sql = "SELECT preco_unitario
                                            FROM produto  WHERE idproduto=3";

                                    if($select = mysqli_query($conexao, $sql)){


                                        while($rsProduto = mysqli_fetch_array($select)){
                                ?>
                                <p hidden><?php echo($rsProduto['preco_unitario']) ?></p>
                                <?php            
                                    } 
                                }
                                ?>
                            </div>
                            
                        </div>

                    </div>
                </div>

            </div>
                        
        </main>

    </div>

    <!--SCRIPTS JS-->
    <script src="../../public/scripts/checkout.js"></script>
</body>
</html>