# 📝 Documentação de Funcionalidades e Casos de Teste — NutriFácil  

---

## ⚙ Funcionalidades e Cenários em Gherkin  

### 🥗 **Funcionalidade: Seleção de Dieta**
#### Cenário: Usuário escolhe dieta Low Carb
- **Dado:** Usuário seleciona a dieta "Low Carb"
- **E:** Informa peso `110`, altura `185`, idade `36`, sexo `Masculino`
- **Quando:** Solicita o plano alimentar
- **Então:** Sistema deve sugerir refeições com arroz, peixes e legumes  

---

### 📏 **Funcionalidade: Cálculo de IMC**
#### Cenário: Cálculo de IMC correto
- **Dado:** Usuário informa peso `110` e altura `185`
- **Quando:** Sistema calcula o IMC
- **Então:** IMC deve ser `32.14`  

---

### 🔥 **Funcionalidade: Cálculo de TMB**
#### Cenário: Cálculo de TMB para usuário masculino
- **Dado:** Usuário informa peso `110`, altura `85`, idade `36`, sexo `Masculino`
- **Quando:** Sistema calcula a TMB
- **Então:** TMB deve ser `2081.25`  

---

### 🚫 **Funcionalidade: Registro de alergias/intolerâncias**
#### Cenário: Usuário informa alergia a lactose
- **Dado:** Usuário informa alergia `Lactose`
- **Quando:** Solicita o plano alimentar
- **Então:** Plano deve excluir alimentos com lactose  

---

## 🧪 **Registro Completo de Casos de Teste**

| ID     | Funcionalidade            | Pré-Condição                          | Passos                                      | Dados de Entrada                                          | Resultado Esperado                        | Resultado Obtido                         | Status | Observações                       |
|--------|--------------------------|---------------------------------------|---------------------------------------------|----------------------------------------------------------|-------------------------------------------|------------------------------------------|--------|-----------------------------------|
| FT-01  | Seleção de Dieta Mediterrânea | Usuário autenticado e na tela de seleção | 1. Acessar tela<br>2. Selecionar dieta<br>3. Preencher dados<br>4. Solicitar plano | Dieta: Mediterrânea, Peso: 70, Altura: 170, Idade: 30, Sexo: Feminino | Plano com azeite, peixes, grãos integrais | Plano exibido corretamente com os itens esperados | ✅      | Plano apresentado de forma clara |
| FT-02  | Seleção de Dieta Low Carb  | Usuário autenticado e na tela de seleção | Mesmos passos do FT-01                      | Dieta: Low Carb, Peso: 80, Altura: 175, Idade: 28, Sexo: Masculino | Plano com baixo carboidrato              | Plano exibido corretamente com baixo carboidrato | ✅      | Nenhuma dificuldade encontrada  |
| FT-03  | Cálculo de IMC            | Usuário autenticado                   | 1. Informar peso e altura<br>2. Calcular IMC | Peso: 70, Altura: 170                                 | IMC = 24.22                               | IMC calculado corretamente               | ✅      | Resultado compatível com fórmula |
| FT-04  | Cálculo de TMB            | Usuário autenticado                   | 1. Informar peso, altura, idade, sexo<br>2. Calcular TMB | Peso: 70, Altura: 170, Idade: 30, Sexo: Masculino | TMB = 1665                                | TMB calculado corretamente               | ✅      | Sem observações                  |
| FT-05  | Registro de alergias       | Usuário autenticado e na tela de seleção | 1. Informar alergia<br>2. Gerar plano        | Alergia: Lactose                                        | Plano sem lactose                         | Plano gerado sem alimentos com lactose    | ✅      | Verificado que o plano respeita restrições |

---

## 🐞 **Registro Completo de Bugs**

| ID do Bug | Caso de Teste Relacionado | Descrição do Problema                        | Severidade | Status      | Responsável      | Link |
|-----------|--------------------------|----------------------------------------------|------------|-------------|-----------------|------|
| BUG-01    | FT-03                     | Déficit Diário calculado incorretamente      | Alta       | Finalizado  | Rafael Araújo    | #1   |
| BUG-02    | FT-05                     | Falha na geração da dieta de acordo com a seleção do usuário | Média      | Finalizado  | Rafael Araújo    | #2   |

---

## ✉ **Contato**
Desenvolvido por **Rafael Araújo**