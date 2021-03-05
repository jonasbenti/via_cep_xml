# via_cep_xml
Projeto para realizar buscar CEP através da API via cep retornando um XML.
<br>
Requisitos Minimos:<br>
- PHP7;<br>
- Mysql 5.7;<br>
<br><br>
Observações:<br>
- Salvar os CEPs já inseridos no campo de busca é necessario alterar os parâmetros no arquivo config/cep_conf.ini e renomear para cep.ini;<br>
- Na pasta db esta o dump com alguns CEPs ja inseridos;<br>
- A pasta images possui 2 imagens do buscador, uma buscando CEPs ja cadastrados no BD e outra buscando CEPs novos atráves da API via_cep; <br>
<br>
Melhorias futuras:
- Realizar a busca utilizando AJAX;<br>
- Melhorar Layout das telas;<br>
- Criar uma tela inicial com as opções (Buscar endereço pelo CEP, Buscar endereço pela cidade, listar todos os CEPs cadastrados);<br>
