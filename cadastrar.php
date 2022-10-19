<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="pt-br">

<head> 
    <link rel="stylesheet" href="css/cadastrar.css">
    <link rel="stylesheet" href="css/navbar_secundario.css">
    <link rel="stylesheet" href="css/footer.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@500&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" href="images/TCC-logo.png"/>
    <title>Cadastro | PhysicalBody</title>
</head>

<body>
  <header>
    <nav>
        <a class="nav-logo" href="index.html">Physical Body</a>
    </nav>
</header>
  
  <div class="container">
    <div class="form-image">
      <img src="images/cadastrarft.png">
    </div>
    <div class="form">
      <form action="cadastrarProcesso.php" method="post" name="formulario" id="formulario">
        <div class="form-header">
          <div class="title">
            <h1>CADASTRE-SE AGORA</h1>
          </div>
        </div>
        <?php
                    if (isset($_SESSION['msg'])) {
                    echo $_SESSION['msg'];
                    unset($_SESSION['msg']);
                    } 
        ?>
        <div class="input-group">
          <div class="input-boxe">
            <label for="nome">NOME</label>
            <input id="nome" type="text"minlength="8" maxlength="45" autocomplete="off" name="nome" placeholder="DIGITE SEU NOME" required>
          </div>

          <div class="input-box">
            <label for="email">EMAIL</label>
            <input id="email" type="email" maxlength="80"  autocomplete="off" name="email" placeholder="DIGITE SEU EMAIL" required>
          </div>

          
          <div class="input-box">
            <label for="cpf">CPF</label>
            <input id="cpf" type="text" name="cpf" maxlength="11" autocomplete="off"
            onkeypress="$(this).mask('000.000.000-AA')"placeholder="DIGITE SEU CPF" required>
          </div>

          
          <div class="input-box">
            <label for="nascimento">DATA DE NASCIMENTO</label>
            <input id="nascimento" type="text" maxlength="10" onfocus="(this.type='date')"
            onblur="if(!this.value) this.type='text'" name="nascimento" placeholder="DATA DE NASCIMENTO" required>
          </div>

          <div class="input-box">
            <label for="celular">CELULAR</label>
            <input id="celular" type="tel" maxlength="15"
            autocomplete="off" onkeypress="$(this).mask('(00) 00000-0000')" name="celular" placeholder="DIGITE SEU NUMERO" required>
          </div>

          <div class="input-box">
            <label for="senha">SENHA</label>
            <input id="senha" type="password" name="senha" maxlength="16" minlength="8" placeholder="SENHA" required>
          </div> 

          <div class="input-box">
            <label for="confirma_senha">CONFIRME SUA SENHA</label>
            <input id="confirma_senha" type="password" name="confirma_senha" maxlength="16" minlength="8"  placeholder="CONFIRME SUA SENHA" required>
          </div>
        </div>

        <div class="gender-inputs">
          <div class="gender-title">
            <h5>GÊNERO:</h5>
          </div>

          <div class="gender-group" required>
            <div class="gender-input">
              <input type="radio" id="male" name="sexo" value="Masculino">
              <label for="male">MASCULINO</label>
            </div>

            <div class="gender-input">
              <input type="radio" id="feamle" name="sexo" value="Feminino">
              <label for="feamle">FEMININO</label>
            </div>

            <div class="gender-input">
              <input type="radio" id="other" name="sexo" value="Outros">
              <label for="other">OUTROS</label>
            </div>
          </div>
        </div>
            <div class="termo">
                <input type="checkbox" name="termo" id="termo" required>
                CONCORDO COM OS<a id="TERMOS" href="" data-bs-toggle="modal" data-bs-target="#modal_termos"> TERMOS DE CONTRATO</a>
            </div>
          <div class="continue-button mt-3">
            <input type="submit" name="Continuar" id="button-button" value="CONTINUAR" onclick="validar()">
          </div>
      </form>
    </div>
  </div>

  <div class="modal fade" id="modal_termos" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-scrollable" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">TERMOS DE CONTRATO - PHYSICAL BODY</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="common-limiter common-text" id="terms-text"><p><strong>A Physical Body, com sede na Rua Mariz e Barros , 273 , bairro Praça da Bandeira, cidade do Rio de Janeiro, CEP 20270-003, denominada neste contrato "ACADEMIA", prestará ao contratante, neste ato denominado “CLIENTE”, serviços para a prática de atividades físicas, mediante a confirmação da leitura e aceite das cláusulas e condições estabelecidas abaixo.</strong></p>

          <p><strong>DADOS DO CLIENTE CONTRATANTE</strong>&nbsp;<br>
          <strong>Nome</strong>: [NOME_CLIENTE].&nbsp;<strong>CPF</strong>:[CPF].&nbsp;<strong>Data de Nascimento</strong>: [NASCIMENTO<strong>].&nbsp;<strong>Celular:</strong>&nbsp;[CELULAR]&nbsp;<strong>E-mail</strong>:[EMAIL]&nbsp;<br>
          <strong>Serviço contratado:</strong>&nbsp;[CONTRATOS]&nbsp;<br>
          <strong>Valor total contratado:</strong>&nbsp;[VALOR TOTAL]&nbsp;<br>
          <strong>Data da compra:</strong>&nbsp;[DT_VENDA]</p>
          
          <p><strong>SERVIÇOS&nbsp;</strong></p>
          
          <p>Este contrato tem como objeto o uso da&nbsp;<strong>ACADEMIA</strong>, pelo&nbsp;<strong>CLIENTE,&nbsp;</strong>para a prática de atividades físicas com a coordenação e supervisão de profissionais da Performa, de acordo com as condições do plano contratado. Os horários e dias de&nbsp;atendimentopodem sofrer alterações no decorrer do contrato, de acordo com as necessidades da&nbsp;<strong>ACADEMIA</strong>. O&nbsp;<strong>CLIENTE&nbsp;</strong>poderá frequentar as instalações da&nbsp;<strong>ACADEMIA&nbsp;</strong>nos horários pré-determinados de acordo com a (s) modalidade (s) contratada (s). Caso a&nbsp;<strong>ACADEMIA&nbsp;</strong>disponibilize novas atividades, o&nbsp;<strong>CLIENTE&nbsp;</strong>seguirá as mesmas normas que regem este contrato para delas participar e/ou normas específicas da nova modalidade. O&nbsp;<strong>CLIENTE</strong>, portanto, está ciente de que poderão ser extintas, criadas ou remanejadas aulas e modalidades de atividades, como também efetuadas mudanças de horários e de instrutores, sem prévio aviso, independentemente do plano de serviços que o&nbsp;<strong>CLIENTE</strong>&nbsp;tiver contratado.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>MENORES</strong>&nbsp;<br>
          Se o&nbsp;<strong>CLIENTE</strong>&nbsp;for menor (de 18 anos) ou incapaz para atos civis assinará este contrato juntamente com o pai, a mãe ou o responsável legal. O adulto responsável responderá, solidariamente, por todos os atos, omissões ou obrigações do menor ou incapaz e autoriza-o à prática das atividades físicas pretendidas.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>ACESSO</strong></p>
          
          <p>O acesso às dependências da ​<strong>ACADEMIA&nbsp;</strong>​será realizado através de registro da impressão digital, que deve ser realizado pelo aluno no ato da matrícula. Alguns planos com preços especiais apresentam restrições de acesso em determinados horários.&nbsp;<strong>Não é permitida a entrada de acompanhantes nos espaços restritos aos clientes</strong>. O aluno titular pode trazer um convidado à academia, com intenção de conhecer, mediante prévia autorização para a data solicitada, sendo que este ficará responsável pela conduta de seu convidado enquanto permanecerem nas dependências da academia.&nbsp;&nbsp;<strong>Por motivos de segurança, é proibida a permanência de crianças nas dependências da academia sem acompanhamento dos pais ou responsável. Elas devem permanecer no espaço kids, somente no horário em que houver recreacionista e enquanto o (s) responsável (eis) estiver (em) treinando na academia</strong>.</p>
          
          <p>&nbsp;</p>
          
          <p>​<strong>AULAS</strong><br>
          O&nbsp;<strong>CLIENTE</strong>&nbsp;está submetido à disponibilidade de vagas para as modalidades de aulas coletivas e semi-personal. O gerenciamento será feito através de sistema de reservas online&nbsp;via site ou aplicativo Performa.&nbsp;As reservas podem ser realizadas pelo<strong>CLIENTE</strong>&nbsp;com 24 horas de antecedência até o horário de início da atividade. De acordo com o plano contratado pode haver restrições no acesso a determinadas atividades. Caso não possa comparecer, o&nbsp;<strong>CLIENTE</strong>&nbsp;deve cancelar a aula reservada pelo site ou app com até 1h de antecedência. O&nbsp;<strong>CLIENTE&nbsp;</strong>que por 3 vezes reservar, mas não comparecer às aulas, dentro de um período de 30 dias, não conseguirá fazer novos agendamentos por 20 dias. A suspensão é para agendamentos online, e não para o acesso à&nbsp;<strong>ACADEMIA</strong>. O cliente poderá participar de qualquer aula com vaga disponível no horário de início.&nbsp;Para agendar avaliação física e bioimpedância, o<strong>CLIENTE&nbsp;</strong>também deverá usar sistema de reservas online&nbsp;via site ou aplicativo Performa. As reservas podem ser realizadas pelo&nbsp;<strong>CLIENTE</strong>&nbsp;com 7 dias de antecedência até o horário de início da atividade. Caso não possa comparecer, o<strong>CLIENTE</strong>&nbsp;deve cancelar a avaliação e/ou bioimpedância reservada com até 24h de antecedência. O&nbsp;<strong>CLIENTE&nbsp;</strong>que reservar e não comparecer a avaliação terá que aguardar 45 dias para nova reserva gratuita. O&nbsp;<strong>CLIENTE&nbsp;</strong>que reservar e não comparecer à bioimpedância terá que aguardar 90 dias para nova reserva gratuita.&nbsp;A tolerância de atraso para o ingresso do aluno nas salas onde estiverem sendo desenvolvidas as atividades físicas com horários pré-estabelecidos é de, no máximo, 10 (dez) minutos, podendo a vaga ser liberada para outro cliente presente após este tempo.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>DECLARAÇÃO DE SAÚDE</strong></p>
          
          <p>Para contratar os serviços e usufruir deles o&nbsp;<strong>CLIENTE</strong>&nbsp;deverá preencher o PAR-Q (Questionário de Aptidão para Atividade Física) e/ou apresentar atestado médico específico para a prática da (s) atividade (s) contratada(s) e renová-lo (s) na periodicidade que vier a ser determinada pela lei aplicável, assim como atender a outras exigências da&nbsp;<strong>ACADEMIA</strong>&nbsp;relacionadas a comprovação e/ou entendimento das suas condições e limitações para a prática de atividades físicas. Em razão de exigências legais e/ou para a sua segurança, caso o&nbsp;<strong>CLIENTE</strong>&nbsp;não cumpra com o disposto nesta cláusula a&nbsp;<strong>ACADEMIA</strong>&nbsp;poderá não permitir o seu acesso a academia e/ou a prática de atividades físicas até a regularização.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>PRAZO</strong></p>
          
          <p>Este contrato tem o prazo contratado de [NOME DO PLANO]. O plano mensal e os planos de venda direta no cartão de crédito e boleto não se renovam automaticamente. A cada renovação será aplicável o Contrato de Prestação de Serviços de Atividades Físicas que estiver vigente na data respectiva. Na modalidade DCC (Débito Recorrente no Cartão de Crédito) o plano é válido por&nbsp;<strong>prazo indeterminado.&nbsp;</strong>Se o&nbsp;<strong>CLIENTE</strong>&nbsp;não desejar renovar ao final do período mínimo contratado deverá cancelar o contrato sem multa conforme regras descritas no item Cancelamento deste Contrato.</p>
          
          <p><strong>PAGAMENTO</strong></p>
          
          <p>A&nbsp;<strong>ACADEMIA&nbsp;</strong>oferece planos mensais, concedendo descontos sobre a mensalidade em função do prazo contratado. Em razão dos descontos concedidos,&nbsp;<strong>em caso de cancelamento do plano antes de seu término, fica ressalvado o disposto no item&nbsp;</strong>Cancelamento deste Contrato.&nbsp;<strong>O CLIENTE somente poderá frequentar as instalações da ACADEMIA enquanto estiver em dia com os pagamentos, sendo que estes deverão ser realizados independentemente da frequência às atividades.<strong>&nbsp;</strong></strong>Pelos serviços ora contratados, o&nbsp;<strong>CLIENTE</strong>&nbsp;pagará à&nbsp;<strong>ACADEMIA,</strong>&nbsp;além da taxa de matrícula no momento da contratação, o valor mensal de acordo com a tabela de preços vigente na data da contratação. Nos planos mensal e venda direta no cartão de crédito o valor total do plano comprometerá o limite do cartão de crédito.&nbsp;No plano&nbsp;DCC (Débito Recorrente no Cartão de Crédito) o&nbsp;valor total do plano não comprometerá o limite do cartão de crédito, apenas o valor mensal contará no limite, estando o&nbsp;<strong>CLIENTE</strong>&nbsp;sujeito às regras de pagamento das administradoras. Aderindo a este contrato DCC, o&nbsp;<strong>CLIENTE</strong>&nbsp;autoriza a&nbsp;<strong>ACADEMIA</strong>&nbsp;a debitar, no cartão de crédito indicado, os valores mensais previstos. A autorização aqui concedida é irrevogável e terá validade enquanto existirem valores a serem pagos, ainda que a matrícula tenha sido cancelada e o contrato rescindido. Na hipótese de a administradora do cartão de crédito não autorizar a liberação da quantia devida, o<strong>CLIENTE&nbsp;</strong>deverá comparecer à&nbsp;<strong>ACADEMIA</strong>&nbsp;imediatamente a fim de quitar o débito, podendo ser permitido ao&nbsp;<strong>CLIENTE</strong>&nbsp;apresentar outra forma de pagamento praticada pela&nbsp;<strong>ACADEMIA&nbsp;</strong>para quitação, devendo também neste momento o&nbsp;<strong>CLIENTE</strong>&nbsp;ratificar ou indicar um novo cartão de crédito, se for o caso. Para o plano&nbsp;DCC, considerando o prazo indeterminado do plano, o valor dos serviços será reajustado na periodicidade mínima admitida em lei, atualmente anual, com base na variação positiva do Índice Geral de Preços – Mercado/IGP - M, divulgado pela Fundação Getúlio Vargas, ou, no caso de sua extinção ou de sua inexistência por outro índice que melhor reflita a perda do poder aquisitivo da moeda nacional ocorrida no período.&nbsp;</p>
          
          <p>&nbsp;</p>
          
          <p><strong>INADIMPLÊNCIA</strong></p>
          
          <p>O&nbsp;<strong>CLIENTE&nbsp;</strong>que estiver inadimplente terá o seu acesso à&nbsp;<strong>ACADEMIA</strong>&nbsp;suspenso após 5 dias do vencimento,&nbsp;até a quitação do débito, sem direito à compensação dos dias em que esteve impedido de frequentá-la. Os valores não recebidos nas datas de seus vencimentos serão atualizados com multa de 2% do valor da mensalidade e 0,5% de juros por dia de atraso.</p>
          
          <p>Havendo atraso da mensalidade, superior a 15 dias do vencimento, a&nbsp;<strong>ACADEMIA&nbsp;</strong>fica desde já autorizada a:</p>
          
          <p>a) Incluir o nome do&nbsp;<strong>CLIENTE&nbsp;</strong>no SPC/Serasa;&nbsp;<br>
          <strong>b)&nbsp;</strong>Emitir títulos de créditos contra o&nbsp;<strong>CLIENTE</strong>;&nbsp;<br>
          <strong>c)&nbsp;</strong>Ajuizar Ação Moratória ou Ação de Execução;</p>
          
          <p>Sempre que julgar necessário, a&nbsp;<strong>ACADEMIA&nbsp;</strong>poderá exigir do&nbsp;<strong>CLIENTE&nbsp;</strong>a prova de quitação das mensalidades juntamente com o documento de identificação emitido pela mesma.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>CANCELAMENTO</strong></p>
          
          <p><em><strong>O CLIENTE poderá solicitar o cancelamento a qualquer momento pessoalmente e por escrito na recepção da ACADEMIA, desde que esteja em dia com o pagamento das mensalidades ou outros débitos existentes. Em hipótese alguma será aceito cancelamento deste contrato por telefone ou e-mail. Não haverá devolução dos valores já pagos mesmo que o CLIENTE não tenha frequentado a ACADEMIA. Para o cancelamento do contrato antes do término de seu período de vigência mínima, por iniciativa do CLIENTE ou em decorrência do descumprimento, pelo CLIENTE, de suas obrigações contratuais, será devido à ACADEMIA o equivalente a 25% (vinte e cinco por cento) do valor das parcelas a vencer, além de perder o período de trancamento a que tenha direito, caso este ainda não tenha sido usufruído. O CLIENTE declara-se ciente que, no caso dos planos pagos com cartão de crédito, caso deseje efetuar o cancelamento&nbsp;deverá fazê-lo pessoalmente na academia com antecedência mínima de 40 (quarenta) dias da data prevista para a ocorrência do próximo débito, sendo certo que, caso o CLIENTE solicite o cancelamento em prazo inferior, a ACADEMIA não efetuará a devolução do (s) valor(es) correspondente(s) aos débitos devidos deste prazo de 40 (quarenta) dias.&nbsp;A ACADEMIA poderá rescindir o contrato de prestação de serviços de forma unilateral, caso o CLIENTE atue nas dependências da ACADEMIA de forma indisciplinada ou de forma que denigra a imagem da ACADEMIA.&nbsp;</strong></em></p>
          
          <p>&nbsp;</p>
          
          <p><strong>TRANCAMENTO</strong></p>
          
          <p>A&nbsp;<strong>ACADEMIA</strong>&nbsp;oferece a opção de trancamento por determinado período (mínimo de sete dias), devendo o&nbsp;<strong>CLIENTE</strong>, para usufruir deste direito, comunicar o interesse à recepção da&nbsp;<strong>ACADEMIA</strong>&nbsp;com antecedência mínima de um dia, através de formulário específico, sendo que o&nbsp;<strong>CLIENTE</strong>&nbsp;não poderá frequentar a academia durante este período. 1. Plano Trimestral - interrupção de 7 dias corridos; (2) Plano Semestral - interrupção total de 15 dias; (3) Plano Anual - interrupção total de 30 dias; Plano 18 Meses - interrupção total de 45 dias; Plano 24 Meses – interrupção total de 60 dias. Não há trancamento para o plano mensal. Durante o trancamento da matrícula, o&nbsp;<strong>CLIENTE</strong>&nbsp;pagará normalmente as mensalidades nos respectivos vencimentos e ganhará créditos em dias pagos e não frequentados ao final do contrato. NÃO SÃO PERMITIDOS PEDIDOS RETROATIVOS OU ADICIONAIS DE TRANCAMENTO.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>CESSÃO DE DIREITO DE USO</strong></p>
          
          <p>O&nbsp;<strong>CLIENTE</strong>&nbsp;que não pretende mais utilizar seu plano pode ceder o direito de utilização dos serviços e instalações da&nbsp;<strong>ACADEMIA</strong>&nbsp;para outra pessoa, mediante requisição escrita feita na recepção da&nbsp;<strong>ACADEMIA</strong>, e sujeito à aprovação da&nbsp;<strong>ACADEMIA</strong>. O&nbsp;<strong>CLIENTE</strong>&nbsp;não deixa de ser o responsável financeiro pelo plano, sendo que TODOS os pagamentos devidos continuam sob sua responsabilidade. No momento da transferência, o titular do plano não pode ceder o período de trancamento a que tenha direito, caso este ainda não tenha sido usufruído. Na cessão de uso, a pessoa a quem for cedido o direito fará jus à utilização dos dias vincendos, considerado tal período como a diferença entre a quantidade de dias decorridos desde o início da vigência do plano e o período total inicialmente contratado. Caso a pessoa que recebeu o direito de cessão de uso já seja&nbsp;<strong>CLIENTE</strong>&nbsp;da&nbsp;<strong>ACADEMIA</strong>deverá cumprir seu plano até o final e somente depois passará a usufruir o direito de uso cedido, sendo-lhe creditados os dias vincendos do cedente e vetado efetuar nova cessão de direito de uso dos dias recebidos. Caso a pessoa que vier a receber o direito de cessão de uso não seja aluno matriculado na&nbsp;<strong>ACADEMIA,&nbsp;</strong>ficará ela obrigada a cumprir todas as normas da&nbsp;<strong>ACADEMIA,&nbsp;</strong>devendo arcar com as despesas referentes à taxa de matrícula, sendo-lhe vetado efetuar nova cessão de direito de uso dos dias recebidos.&nbsp;&nbsp;A&nbsp;<strong>ACADEMIA&nbsp;</strong>não interfere e nem intermedia a CESSÃO DE DIREITO DE USO e está isenta de qualquer responsabilidade no acordo entre as partes.&nbsp;</p>
          
          <p>&nbsp;</p>
          
          <p><strong>NORMAS DE CONDUTA</strong></p>
          
          <p><strong>É expressamente proibida qualquer conduta do aluno que não esteja de acordo com o objeto deste instrumento, que seja contrária à moral e aos bons costumes ou que, por qualquer forma, cause perturbação ao ambiente da ACADEMIA, aos funcionários, instrutores, professores ou frequentadores, como, exemplificativamente</strong>: (I) uso inadequado ou impróprio dos equipamentos; (II) atos ou atitudes que perturbem outros clientes e que pelos mesmos sejam repelidas; (III) atitudes agressivas com outros clientes ou com funcionários da academia; (IV) a comercialização de produtos ou serviços nas dependências da academia.</p>
          
          <p>Além das condutas acima referidas, a&nbsp;<strong>ACADEMIA&nbsp;</strong>reserva-se ao direito de considerar como inadequadas e proibidas outras condutas que não estejam de acordo com o objeto deste instrumento. É vetado ao&nbsp;<strong>CLIENTE</strong>&nbsp;retirar equipamentos ou qualquer outro bem de propriedade da&nbsp;<strong>ACADEMIA&nbsp;</strong>de suas instalações. O&nbsp;<strong>CLIENTE</strong>&nbsp;deve zelar e utilizar adequadamente os equipamentos e bens da&nbsp;<strong>ACADEMIA</strong>, ficando obrigado a reparar quaisquer danos por ele causados a equipamentos, funcionários e/ou terceiros, podendo ter as suas atividades suspensas até a efetiva reparação do dano.&nbsp;<strong>OS DANOS DE QUALQUER NATUREZA DECORRENTES DE ATIVIDADES&nbsp;</strong><strong>EXECUTADAS SEM A SOLICITAÇÃO DE ORIENTAÇÃO OU COM INOBSERVÂNCIA DAS INSTRUÇÕES DOS PROFESSORES DA ACADEMIA NÃO SERÃO DE RESPONSABILIDADE DA MESMA E CARACTERIZARÃO CULPA EXCLUSIVA DO CLIENTE.&nbsp;</strong>O aluno que cometer qualquer atitude, ofensa, agressão física e demais atos que infrinjam a lei e/ou que resultem em prejuízo para a academia, deverá ressarcir a mesma. Não é permitido o uso de qualquer outro calçado que não seja tênis para a prática dos exercícios, salvo em modalidades específicas. Para que os movimentos sejam executados com exatidão, é vetado se exercitar com roupas jeans, cargo ou social. Os trajes adequados são: shorts, calças de agasalho ou moletom, camiseta ou regata.&nbsp;<strong>A ACADEMIA&nbsp;</strong>pode impedir a participação de aluno em aula que não lhe seja recomendada pela sua avaliação física, médica ou se o aluno não estiver devidamente trajado e/ou equipado. A tolerância de atraso para o ingresso do aluno nas salas onde são realizadas atividades coletivas com horários pré-estabelecidos é de, no máximo, dez minutos.&nbsp;&nbsp;É vetada a entrada e a circulação de animais na academia.&nbsp;&nbsp;Não é permitido fumar ou ingerir bebida alcoólica no interior da academia.&nbsp;É terminantemente proibido o ingresso de pessoas portando armas de fogo no interior da academia.&nbsp;Somente estão autorizados a exercer a atividade de&nbsp;<em>personal trainer</em>, os profissionais devidamente cadastrados junto à academia, sendo que&nbsp;<strong>não será permitida, em hipótese alguma, a atuação do aluno de forma a caracterizar trabalho como instrutor e/ou personal trainer</strong>.&nbsp;Não é permitido filmar ou fotografar o interior da academia e das aulas, salvo mediante autorização expressa da Direção.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>DESCUMPRIMENTO DE NORMAS</strong></p>
          
          <p>O&nbsp;<strong>CLIENTE</strong>&nbsp;que mantiver conduta em desacordo com o objeto deste contrato, estará sujeito à advertência verbal e/ou cancelamento de sua matrícula com rescisão antecipada do contrato ou a não renovação do mesmo, a critério da&nbsp;<strong>ACADEMIA</strong>. O&nbsp;<strong>CLIENTE</strong>&nbsp;que praticar, no interior da academia, atos de agressão física, ameaça, venda de substâncias ilícitas, roubo, furto e outros que configurem ilícitos penais, bem como atos cuja gravidade justifique tal medida, a critério da ​<strong>ACADEMIA</strong>​, estará sujeito à rescisão imediata e permanente do contrato e ao ressarcimento de perdas e danos causados à​&nbsp;<strong>ACADEMIA</strong>&nbsp;e/ou terceiros. Ocorrendo a rescisão de que trata os itens acima, a ​<strong>ACADEMIA&nbsp;</strong>fará jus ao recebimento de multa de 25% do valor dos meses vincendos, conforme previsto no item que trata do Cancelamento.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>RESPONSABILIDADE POR BENS DO CLIENTE</strong></p>
          
          <p><strong>A&nbsp;ACADEMIA&nbsp;não se responsabiliza pela perda, dano ou extravio de objetos e pertences pessoais ou de valor nas suas dependências</strong>. A utilização do guarda-volumes&nbsp;<strong>não implica em dever de guarda da ACADEMIA</strong>, sendo vetado ao&nbsp;<strong>CLIENTE</strong>&nbsp;deixar seus pertences nos vestiários após a saída da academia.&nbsp;<strong>Para a utilização dos armários no vestiário masculino,</strong>&nbsp;<strong>por questões de sua própria segurança e inviolabilidade do armário, o CLIENTE deve utilizar cadeado de sua propriedade</strong>, ficando a&nbsp;<strong>ACADEMIA&nbsp;</strong>isenta de qualquer responsabilidade sobre o material deixado no armário.&nbsp;<strong>No vestiário feminino, a CLIENTE deverá criar uma senha eletrônica nova todos os dias, obedecendo às normas de segurança conforme manual de instruções afixado no mural do vestiário</strong>, ficando a&nbsp;​<strong>ACADEMIA&nbsp;</strong>isenta de qualquer responsabilidade caso tal procedimento não seja obedecido.&nbsp;A utilização do armário é permitida somente durante a permanência do cliente na academia e os armários encontrados fechados após o horário de funcionamento serão abertos e os objetos neles contidos serão encaminhados às autoridades competentes, sem direito a indenização.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>IMAGEM&nbsp;&nbsp;</strong><br>
          O&nbsp;<strong>CLIENTE</strong>, neste ato, autoriza que a&nbsp;<strong>ACADEMIA&nbsp;</strong>se utilize dos meios eletrônicos (e-mail, telefone, mensagens SMS) com o objetivo de enviar notícias, avisos, dicas, promoções e outras informações relevantes acerca do funcionamento da academia. O presente instrumento constitui autorização de uso da imagem, permitindo a utilização da imagem do&nbsp;<br>
          <strong>CLIENTE</strong>&nbsp;pela&nbsp;<strong>ACADEMIA&nbsp;</strong>em qualquer suporte material apto a reprodução de imagens ou imagens conjugadas com som, podendo, tais como “home-video”, “vídeo-laser disc”, “digital video disc” (DVD) e similares; “CD-ROM”; rede internet, e outros, bem como ser difundida através de quaisquer meios como projeção, transmissão, difusão e divulgação e, ainda, em quaisquer processos e veículos de reprodução, exibição, existentes no Brasil e no exterior, além da inclusão da imagem do aluno em catálogos e folhetos e demais materiais gráficos que tenham a finalidade de divulgar a&nbsp;<strong>ACADEMIA</strong>. A presente autorização se dá sem quaisquer ônus ou restrições de território, tempo, número de exibições e exemplares que venham a ser distribuídos.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>CONTRATAÇÃO ELETRÔNICA</strong></p>
          
          <p><strong>A adesão ao presente contrato poderá ocorrer de forma eletrônica, através do website, tablets, seu celular, totens ou outros dispositivos eletrônicos. Ao contratar este serviço de atividades físicas o CLIENTE manifesta sua ciência e concordância com os termos do presente contrato, assim como declara-se ciente e de acordo de que a ACADEMIA no processo de adesão poderá efetuar a coleta e armazenamento de seus dados biométricos e informações pessoais, bem como de registros de suas ações, necessários para a comprovação de validade desta contratação.&nbsp;</strong></p>
          
          <p><br>
          <strong>DISPOSIÇÕES FINAIS</strong></p>
          
          <p>As normas constantes dos avisos e orientações afixados no interior das instalações da academia, que não estiverem contempladas neste contrato, passam a fazer parte integrante do mesmo, sendo certo que o seu não cumprimento poderá acarretar na rescisão antecipada ou a não renovação do mesmo. Toda e qualquer sugestão, reclamação ou alteração deverá ser encaminhada, por escrito, à direção da&nbsp;<strong>ACADEMIA</strong>, que analisará cada caso conforme critérios estabelecidos. Os casos omissos neste contrato deverão ser analisados pela direção da&nbsp;<strong>ACADEMIA</strong>.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>Declaro que li integralmente este&nbsp;</strong><strong>Contrato&nbsp;de Prestação de Serviços de&nbsp;Atividades Físicas, entendi e concordo com todas as cláusulas e condições.</strong></p>
          </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">FECHAR</button>
      </div>
    </div>
  </div>
</div>
<footer>
    <section>
      <div class="main-footer">
        <div id="contato">
          <h1>FALE CONOSCO</h1>
          <div class="contato-detalhes">
            <a href="tel:+5521999999999">Celular: +55 (21) 99999-9999</a>
            <a href="mailto:Physicalbody00@gmail">Email: physicalbody00@gmail.com</a>
          </div>
          <div class="endereco-detalhes">
           <h1>ENDEREÇO</h1>
            <p>Praça da Bandeira, Zona Norte, Rio de Janeiro</p>
          </div>
        </div>
        <div class="redes-sociais">
          <h1>NOSSAS REDES</h1>
          <div class="sociallogos">
            <a href="#"><img src="images/instagram-icon.svg">Instagram</a>
            <a href="#"><img src="images/facebook-icon.svg">Facebook</a>
            <a href="#"><img src="images/twitter-icon.svg">Twitter</a>
          </div>
        </div>
      </div>
      <span>&copy; Physical Body Copyright 2009 All Rights Reserved</span>
    </section>
  </footer>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
    <script defer src="scripts/validacao.js"></script>
    <script defer src="scripts/blockcaracter.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
</body>

</html>