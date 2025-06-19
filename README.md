# NutriFácil — Plataforma Web para Nutrição Personalizada

## 🌟 Sobre o projeto
O **NutriFácil** é um sistema web responsivo para geração de planos alimentares personalizados com base em dados e preferências dos usuários.  
Ele visa democratizar o acesso à orientação nutricional de forma prática e eficiente.

## 🎯 Objetivos
- Coletar dados do usuário (peso, altura, idade, sexo, objetivo, tempo de meta)
- Gerar automaticamente um plano alimentar com refeições e quantidades
- Exibir dieta personalizada com opção de pagamento
- Disponibilizar envio por e-mail ou WhatsApp

## ⚙ Tecnologias Utilizadas
- PHP 8.x
- MySQL
- HTML5 / CSS3
- JavaScript básico
- PHPMailer (para envio de e-mails, no futuro)
- Git + GitHub

## 🏗 Estrutura de Arquivos
```
/nutrifacil

├── index.php
├── pagina_avaliacao.php
├── pagina3_dieta.php
├── pagina_dieta_gerada.php
├── pagina_pagamento.php
├── pagina_envio.php
├── estilo.css
├── tests/
│   ├── funcionalidade.md
│   └── usabilidade/
├── slide/
│   └── apresentacao1.pdf
├── sistema_db.sql
├── LICENSE
├── .gitignore
└── README.md

```

## 🧪 Como rodar os testes
Funcionalidade: Acesse tests/funcionalidade.md, siga os cenários Gherkin e registre os resultados.
Usabilidade: Use os formulários em tests/usabilidade/ durante os testes com participantes.
Bugs: Registre os bugs como issues no GitHub e referencie no relatório de testes.

```

## 🚀 Como executar localmente
1. Clone o repositório:  
```
git clone https://github.com/rafaeldevel/nutrifacil.git
```
2. Configure um servidor local (ex: XAMPP, MAMP, Laragon)
3. Configure o banco de dados MySQL e atualize as credenciais no código
4. Acesse via navegador:  
`http://localhost/nutrifacil/`

## 📌 Melhorias Futuras
- Validações dinâmicas com JavaScript
- Gráficos de acompanhamento nutricional
- App móvel nativo

## ✉ Contato
Projeto desenvolvido por Rafael Araújo.
e-mail: rafaozster@gmail.com
