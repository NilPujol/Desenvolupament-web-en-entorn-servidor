<?php
session_start()
?>
<!DOCTYPE html>
<html lang="ca">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Votació popular Concurs Internacional de Gossos d'Atura 2023</title>
    <link rel="stylesheet" href="css/style.css">
    <script type="text/javascript" src="js/js.js"></script>
</head>

<body>
    <div class="wrapper">
        <header>Votació popular del Concurs Internacional de Gossos d'Atura 2023- FASE <span> 1 </span></header>
        <p class="info"> Podeu votar fins el dia 01/02/2023</p>

        <p class="warning" hidden="true"> Ja has votat al gos MUSCLO. Es modificarà la teva resposta</p>
        <div class="poll-area">
            <form action="resultats.php" method="post">
                <label for="opt-1" class="opt-1">
                    <input type="submit" name="opt" id="opt-1" value="1" />
                    <div class="row">
                        <div class="column">
                            <div class="right">
                                <span class="circle"></span>
                                <span class="text">Musclo</span>
                            </div>
                            <img class="dog" alt="Musclo" src="img/g1.png">
                        </div>
                    </div>
                </label>
                <label for="opt-2" class="opt-2">
                    <input type="submit" name="opt" id="opt-2" value="2" />
                    <div class="row">
                        <div class="column">
                            <div class="right">
                                <span class="circle"></span>
                                <span class="text">Jingo</span>
                            </div>
                            <img class="dog" alt="Jingo" src="img/g2.png">
                        </div>
                    </div>
                </label>
                <label for="opt-3" class="opt-3">
                    <input type="submit" name="opt" id="opt-3" value="3" />
                    <div class="row">
                        <div class="column">
                            <div class="right">
                                <span class="circle"></span>
                                <span class="text">Xuia</span>
                            </div>
                            <img class="dog" alt="Xuia" src="img/g3.png">
                        </div>
                    </div>
                </label>
                <label for="opt-4" class="opt-4">
                    <input type="submit" name="opt" id="opt-4" value="4" />
                    <div class="row">
                        <div class="column">
                            <div class="right">
                                <span class="circle"></span>
                                <span class="text">Bruc</span>
                            </div>
                            <img class="dog" alt="Bruc" src="img/g4.png">
                        </div>
                    </div>
                </label>
                <label for="opt-5" class="opt-5">
                    <input type="submit" name="opt" id="opt-5" value="5" />
                    <div class="row">
                        <div class="column">
                            <div class="right">
                                <span class="circle"></span>
                                <span class="text">Mango</span>
                            </div>
                            <img class="dog" alt="Mango" src="img/g5.png">
                        </div>
                    </div>
                </label>
                <label for="opt-6" class="opt-6">
                    <input type="submit" name="opt" id="opt-6" value="6" />
                    <div class="row">
                        <div class="column">
                            <div class="right">
                                <span class="circle"></span>
                                <span class="text">Fluski</span>
                            </div>
                            <img class="dog" alt="Fluski" src="img/g6.png">
                        </div>
                    </div>
                </label>
                <label for="opt-7" class="opt-7">
                    <input type="submit" name="opt" id="opt-7" value="7" />
                    <div class="row">
                        <div class="column">
                            <div class="right">
                                <span class="circle"></span>
                                <span class="text">Fonoll</span>
                            </div>
                            <img class="dog" alt="Fonoll" src="img/g7.png">
                        </div>
                    </div>
                </label>
                <label for="opt-8" class="opt-8">
                    <input type="submit" name="opt" id="opt-8" value="8" />
                    <div class="row">
                        <div class="column">
                            <div class="right">
                                <span class="circle"></span>
                                <span class="text">Swing</span>
                            </div>
                            <img class="dog" alt="Swing" src="img/g8.png">
                        </div>
                    </div>
                </label>
                <label for="opt-9" class="opt-9">
                    <input type="submit" name="opt" id="opt-9" value="9" />
                    <div class="row">
                        <div class="column">
                            <div class="right">
                                <span class="circle"></span>
                                <span class="text">Coloma</span>
                            </div>
                            <img class="dog" alt="Coloma" src="img/g9.png">
                        </div>
                    </div>
                </label>
            </form>
        </div>

        <p> Mostra els <a href="resultats.php">resultats</a> de les fases anteriors.</p>
    </div>

</body>

</html>