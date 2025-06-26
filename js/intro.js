let idade = 25; // Declarando uma variável com valor numérico
console.log(idade); // Imprimindo o valor da variável no console
let nome = "João"; // Declarando uma variável com valor de string
let idade2 = "23";
let resultado1 = idade + Number(idade2); // Concatenando string e número
console.log(resultado1); // Resultado da concatenação

/*
console.log("Olá Mundo!");
console.info("Este é um exemplo de código JavaScript.");
console.warn("Cuidado! Isto é um aviso.");
console.error("Erro! Algo deu errado.");
console.debug("Depuração: Verificando o estado do programa.");
*/

//escopo de variaveis
//chaves abre bloco de código
//fora do escopo é global
let idade3 = 30; // Declarando uma variável global
{
//dentro do escopo é local
let idade3 = 35; // Declarando uma variável local com o mesmo nome
}
console.log(idade3); // Imprime 35, pois a variável local sobrescreveu a global