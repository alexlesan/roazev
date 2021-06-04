<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>checkout</title>
    <script src="script.js"></script>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
</head>
<body>
<div class="card">
    <img src="technical-plannet-logo.png" width="120px" class="logo">
</div>
<div class="container">
    <div class="window">
        <div class="credit-info">
            <div class="credit-info-content">
                <form method="POST" action="process.php">
                    <input type="hidden" name="document_number" value="76600763000135"/>
                    <input type="hidden" name="amount" value="1000"/>
                    <input type="hidden" name="order_number" value="0000000018">
                    <input type="hidden" name="order_description" value="PAG*TESTE">
                    <input type="hidden" name="customer_cdh" value="05002827063">
                    <input type="hidden" name="customer_first_name" value="JOAO">
                    <input type="hidden" name="customer_last_name" value="PAULO">
                    <input type="hidden" name="customer_address" value="Nome da Rua">
                    <input type="hidden" name="customer_complement" value="Complemento">
                    <input type="hidden" name="customer_city" value="São Paulo">
                    <input type="hidden" name="customer_state" value="SP">
                    <input type="hidden" name="customer_ip" value="<?php echo $_SERVER['REMOTE_ADDR'];?>">
                    <input type="hidden" name="customer_country" value="BRA">

                    <table class="half-input-table">
                        <tr>
                            <td colspan="2">Selecione o Seu Cartão:</td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                <br>
                                <div class="row" id="cards-flag">
                                    <div class="col-xs-3">
                                        <div class="row">
                                            <input type="radio" name="card_type" value="3">
                                            <img src="https://dl.dropboxusercontent.com/s/ubamyu6mzov5c80/visa_logo%20%281%29.png" width="50">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="row">
                                            <input type="radio" name="card_type" value="1">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/thumb/2/2a/Mastercard-logo.svg/200px-Mastercard-logo.svg.png" width="40">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="row">
                                            <input type="radio" name="card_type" value="5">
                                            <img src="https://www.redhat.com/cms/managed-files/logo-elo.svg" width="60">
                                        </div>
                                    </div>
                                    <div class="col-xs-3">
                                        <div class="row">
                                            <input type="radio" name="card_type" value="9">
                                            <img src="https://upload.wikimedia.org/wikipedia/commons/f/fa/American_Express_logo_%282018%29.svg" width="40">
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    </table>
                    Número do cartão
                    <input class="input-field" type="text" inputmode="numeric" pattern="[0-9\s]{13,19}" autocomplete="cc-number" maxlength="19" placeholder="xxxx xxxx xxxx xxxx" name="card_number" required/>
                    Titular do cartão

                    <input class="input-field" type="text" name="card_holder" required/>
                    <table class="half-input-table">
                        <tr>
                            <td> Data de Vencimento

                                <input class="input-field" type="text" name="expiration_date" placeholder="MM/YY" required/>
                            </td>
                            <td>CVC

                                <input type="text" class="input-field" name="security_code" required/>
                            </td>
                        </tr>
                    </table>
                    Nome do Comprador

                    <input type="text" class="input-field" name="customer_name" required/>
                    Email Comprador

                    <input type="email" class="input-field" name="customer_email" required/>
                    <table class="half-input-table">
                        <tr>
                            <td>Contato Comprador

                                <input type="text" class="input-field" name="customer_phone" required/>
                            </td>
                            <td> CEP

                                <input type="text" class="input-field" name="customer_zip" required/>
                            </td>
                        </tr>
                    </table>
                    <input type="checkbox" name="hhg"> Eu Aceito os

                    <a href="#" class="terms">
                        Termos de Uso
                    </a>
                    <br>
                    <br>
                    <button type="submit" class="pay-btn">Finalizar</button>
                </form>
            </div>
        </div>
        <div class="order-info ">
            <div class="order-info-content">
                <h2 id="title-pedido">Resumo do Pedido</h2>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/sim84r2xfedj99n/%24_32.JPG" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Nike</span>
                            <br> Free Run 3.0 Feminino
                            <br>
                            <span class="thin small"> Cor: Cinza/Laranja,
                                        Tamanho:
                                        42
																													<br>
																														<br>
																														</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$99,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/qbj9tsbvthqq72c/Vintage-20L-Backpack-by-Fj%C3%A4llr%C3%A4ven.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Fjällräven</span>
                            <br>Mochila Vintage
                            <br>
                            <span class="thin small"> Cor: Oliva, Tamanho: 20L</span>
                        </td>
                    </tr>
                    <br>
                    <tr>
                        <td>
                            <div class="price">R$235,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Monbento</span>
                            <br>Lancheira Dupla
                            <br>
                            <span class="thin small"> Cor: Rosa, Tamanho: Médio</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$25,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Monbento</span>
                            <br>Lancheira Dupla
                            <br>
                            <span class="thin small"> Cor: Rosa, Tamanho: Médio</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$25,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Monbento</span>
                            <br>Lancheira Dupla
                            <br>
                            <span class="thin small"> Cor: Rosa, Tamanho: Médio</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$25,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Monbento</span>
                            <br>Lancheira Dupla
                            <br>
                            <span class="thin small"> Cor: Rosa, Tamanho: Médio</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$25,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Monbento</span>
                            <br>Lancheira Dupla
                            <br>
                            <span class="thin small"> Cor: Rosa, Tamanho: Médio</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$25,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Monbento</span>
                            <br>Lancheira Dupla
                            <br>
                            <span class="thin small"> Cor: Rosa, Tamanho: Médio</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$25,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Monbento</span>
                            <br>Lancheira Dupla
                            <br>
                            <span class="thin small"> Cor: Rosa, Tamanho: Médio</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$25,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Monbento</span>
                            <br>Lancheira Dupla
                            <br>
                            <span class="thin small"> Cor: Rosa, Tamanho: Médio</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$25,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <table class="order-table">
                    <tbody>
                    <tr>
                        <td>
                            <img src="https://dl.dropboxusercontent.com/s/nbr4koso8dpoggs/6136C1p5FjL._SL1500_.jpg" class="full-width"></img>
                        </td>
                        <td>
                            <br>
                            <span class="thin">Monbento</span>
                            <br>Lancheira Dupla
                            <br>
                            <span class="thin small"> Cor: Rosa, Tamanho: Médio</span>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="price">R$25,95</div>
                        </td>
                    </tr>
                    </tbody>
                </table>
                <div class="line"></div>
                <div class="total">
																																																										<span style="float:left;">
																																																											<div class="thin dense "
                                                                                                                                                                                                                                                 id="title">Icms 19%</div>
																																																											<div class="thin dense "
                                                                                                                                                                                                                                                 id="title">Entrega</div>
																																																											<div class="thin dense "
                                                                                                                                                                                                                                                 id="title">Total</div>
																																																										</span>
                    <span style="float:right; text-align:right;">
																																																											<div class="thin dense "
                                                                                                                                                                                                                                                 id="subtitle">R$68,75</div>
																																																											<div class="thin dense "
                                                                                                                                                                                                                                                 id="subtitle">R$4,95</div>
																																																											<div class="thin dense "
                                                                                                                                                                                                                                                 id="subtitle">R$435,55</div>
																																																										</span>
                </div>
            </div>
        </div>
    </div>
    <button style="position:absolute;top: 48em;color: white; background: #4488dd;" class="btn " id="power">Powered By</button>
</div>
</body>
</html>