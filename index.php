<?php

include 'carro.php';
include 'cliente.php';
include 'produto.php';
include 'servico.php';

$cliente = new cliente();

$cliente->nome = "Leticia Bassani";
$cliente->cpf = "095.163.089-02";
$cliente->dataNascimento = "21/01/2010";
$cliente->telefone = "(18) 99999-9999";
$cliente->email = "leticiabassani@email.com";
$cliente->endereco = "Rua das Flores";
$cliente->numero = "100";
$cliente->bairro = "Panambi";
$cliente->cidade = "Paraguacu Paulista";
$cliente->cep = "19700-000";

$carro = new carro();

$carro->marca = "Toyota";
$carro->modelo = "Corolla";
$carro->ano = 2022;
$carro->cor = "Prata";
$carro->placa = "ABC1D23";

$produto1 = new produto();

$produto1->codigo = 1;
$produto1->nome = "Filtro de oleo";
$produto1->categoria = "Filtro";
$produto1->marca = "Tecfil";
$produto1->descricao = "Filtro para motor";
$produto1->quantidade = 1;
$produto1->unidade = "unidade";
$produto1->fornecedor = "Auto Pecas Central";
$produto1->valorUnitario = 45;
$produto1->estoqueMinimo = 5;

$produto2 = new produto();

$produto2->codigo = 2;
$produto2->nome = "Oleo de motor";
$produto2->categoria = "Lubrificante";
$produto2->marca = "Mobil";
$produto2->descricao = "Oleo para motor";
$produto2->quantidade = 4;
$produto2->unidade = "litros";
$produto2->fornecedor = "Auto Pecas Central";
$produto2->valorUnitario = 35;
$produto2->estoqueMinimo = 10;

$produtos = array($produto1, $produto2);

$servico1 = new servico();

$servico1->codigo = 1;
$servico1->nome = "Troca de oleo";
$servico1->descricao = "Troca do oleo do motor";
$servico1->categoria = "Manutencao";
$servico1->valor = 80;

$servico2 = new servico();

$servico2->codigo = 2;
$servico2->nome = "Revisao geral";
$servico2->descricao = "Verificacao do veiculo";
$servico2->categoria = "Revisao";
$servico2->valor = 150;

$servicos = array($servico1, $servico2);

function calcularTotal($produtos, $servicos)
{

    $total = 0;

    foreach ($produtos as $produto) {
        $total = $total + ($produto->valorUnitario * $produto->quantidade);
    }

    foreach ($servicos as $servico) {
        $total = $total + $servico->valor;
    }

    return $total;
}

$totalGeral = calcularTotal($produtos, $servicos);

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <title>Sistema de Oficina Mecanica</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>

    <h1>Sistema de Oficina Mecanica</h1>
    <h2>Relatorio de Atendimento</h2>

    <h2>Dados do Cliente</h2>

    <p>Nome: <?php echo $cliente->nome; ?></p>
    <p>CPF: <?php echo $cliente->cpf; ?></p>
    <p>Data de nascimento: <?php echo $cliente->dataNascimento; ?></p>
    <p>Telefone: <?php echo $cliente->telefone; ?></p>
    <p>E-mail: <?php echo $cliente->email; ?></p>
    <p>Endereco: <?php echo $cliente->endereco; ?>, <?php echo $cliente->numero; ?></p>
    <p>Bairro: <?php echo $cliente->bairro; ?></p>
    <p>Cidade: <?php echo $cliente->cidade; ?></p>
    <p>CEP: <?php echo $cliente->cep; ?></p>

    <h2>Dados do Carro</h2>

    <p>Marca: <?php echo $carro->marca; ?></p>
    <p>Modelo: <?php echo $carro->modelo; ?></p>
    <p>Ano: <?php echo $carro->ano; ?></p>
    <p>Cor: <?php echo $carro->cor; ?></p>
    <p>Placa: <?php echo $carro->placa; ?></p>

    <h2>Pecas Utilizadas</h2>

    <?php
    $totalPecas = 0;

    foreach ($produtos as $produto) {

        $subtotal = $produto->valorUnitario * $produto->quantidade;
        $totalPecas = $totalPecas + $subtotal;
    ?>

        <p>Nome: <?php echo $produto->nome; ?></p>
        <p>Marca: <?php echo $produto->marca; ?></p>
        <p>Quantidade: <?php echo $produto->quantidade; ?></p>
        <p>Valor unitario: R$ <?php echo number_format($produto->valorUnitario, 2, ',', '.'); ?></p>
        <p>Subtotal: R$ <?php echo number_format($subtotal, 2, ',', '.'); ?></p>


    <?php
    }
    ?>

    <p>Total das pecas: R$ <?php echo number_format($totalPecas, 2, ',', '.'); ?></p>

    <h2>Servicos Realizados</h2>

    <?php
    $totalServicos = 0;

    foreach ($servicos as $servico) {

        $totalServicos = $totalServicos + $servico->valor;
    ?>

        <p>Servico: <?php echo $servico->nome; ?></p>
        <p>Descricao: <?php echo $servico->descricao; ?></p>
        <p>Categoria: <?php echo $servico->categoria; ?></p>
        <p>Valor: R$ <?php echo number_format($servico->valor, 2, ',', '.'); ?></p>


    <?php
    }
    ?>

    <p>Total dos servicos: R$ <?php echo number_format($totalServicos, 2, ',', '.'); ?></p>

    <h2>Resumo do Atendimento</h2>

    <p>Total das pecas: R$ <?php echo number_format($totalPecas, 2, ',', '.'); ?></p>
    <p>Total dos servicos: R$ <?php echo number_format($totalServicos, 2, ',', '.'); ?></p>

    <h2>Valor Total: R$ <?php echo number_format($totalGeral, 2, ',', '.'); ?></h2>

</body>

</html>