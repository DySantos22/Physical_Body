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
            <h5>G??NERO:</h5>
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
        <div class="common-limiter common-text" id="terms-text"><p><strong>A Physical Body, com sede na Rua Mariz e Barros , 273 , bairro Pra??a da Bandeira, cidade do Rio de Janeiro, CEP 20270-003, denominada neste contrato "ACADEMIA", prestar?? ao contratante, neste ato denominado ???CLIENTE???, servi??os para a pr??tica de atividades f??sicas, mediante a confirma????o da leitura e aceite das cl??usulas e condi????es estabelecidas abaixo.</strong></p>

          <p><strong>DADOS DO CLIENTE CONTRATANTE</strong>&nbsp;<br>
          <strong>Nome</strong>: [NOME_CLIENTE].&nbsp;<strong>CPF</strong>:[CPF].&nbsp;<strong>Data de Nascimento</strong>: [NASCIMENTO<strong>].&nbsp;<strong>Celular:</strong>&nbsp;[CELULAR]&nbsp;<strong>E-mail</strong>:[EMAIL]&nbsp;<br>
          <strong>Servi??o contratado:</strong>&nbsp;[CONTRATOS]&nbsp;<br>
          <strong>Valor total contratado:</strong>&nbsp;[VALOR TOTAL]&nbsp;<br>
          <strong>Data da compra:</strong>&nbsp;[DT_VENDA]</p>
          
          <p><strong>SERVI??OS&nbsp;</strong></p>
          
          <p>Este contrato tem como objeto o uso da&nbsp;<strong>ACADEMIA</strong>, pelo&nbsp;<strong>CLIENTE,&nbsp;</strong>para a pr??tica de atividades f??sicas com a coordena????o e supervis??o de profissionais da Performa, de acordo com as condi????es do plano contratado. Os hor??rios e dias de&nbsp;atendimentopodem sofrer altera????es no decorrer do contrato, de acordo com as necessidades da&nbsp;<strong>ACADEMIA</strong>. O&nbsp;<strong>CLIENTE&nbsp;</strong>poder?? frequentar as instala????es da&nbsp;<strong>ACADEMIA&nbsp;</strong>nos hor??rios pr??-determinados de acordo com a (s) modalidade (s) contratada (s). Caso a&nbsp;<strong>ACADEMIA&nbsp;</strong>disponibilize novas atividades, o&nbsp;<strong>CLIENTE&nbsp;</strong>seguir?? as mesmas normas que regem este contrato para delas participar e/ou normas espec??ficas da nova modalidade. O&nbsp;<strong>CLIENTE</strong>, portanto, est?? ciente de que poder??o ser extintas, criadas ou remanejadas aulas e modalidades de atividades, como tamb??m efetuadas mudan??as de hor??rios e de instrutores, sem pr??vio aviso, independentemente do plano de servi??os que o&nbsp;<strong>CLIENTE</strong>&nbsp;tiver contratado.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>MENORES</strong>&nbsp;<br>
          Se o&nbsp;<strong>CLIENTE</strong>&nbsp;for menor (de 18 anos) ou incapaz para atos civis assinar?? este contrato juntamente com o pai, a m??e ou o respons??vel legal. O adulto respons??vel responder??, solidariamente, por todos os atos, omiss??es ou obriga????es do menor ou incapaz e autoriza-o ?? pr??tica das atividades f??sicas pretendidas.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>ACESSO</strong></p>
          
          <p>O acesso ??s depend??ncias da ???<strong>ACADEMIA&nbsp;</strong>???ser?? realizado atrav??s de registro da impress??o digital, que deve ser realizado pelo aluno no ato da matr??cula. Alguns planos com pre??os especiais apresentam restri????es de acesso em determinados hor??rios.&nbsp;<strong>N??o ?? permitida a entrada de acompanhantes nos espa??os restritos aos clientes</strong>. O aluno titular pode trazer um convidado ?? academia, com inten????o de conhecer, mediante pr??via autoriza????o para a data solicitada, sendo que este ficar?? respons??vel pela conduta de seu convidado enquanto permanecerem nas depend??ncias da academia.&nbsp;&nbsp;<strong>Por motivos de seguran??a, ?? proibida a perman??ncia de crian??as nas depend??ncias da academia sem acompanhamento dos pais ou respons??vel. Elas devem permanecer no espa??o kids, somente no hor??rio em que houver recreacionista e enquanto o (s) respons??vel (eis) estiver (em) treinando na academia</strong>.</p>
          
          <p>&nbsp;</p>
          
          <p>???<strong>AULAS</strong><br>
          O&nbsp;<strong>CLIENTE</strong>&nbsp;est?? submetido ?? disponibilidade de vagas para as modalidades de aulas coletivas e semi-personal. O gerenciamento ser?? feito atrav??s de sistema de reservas online&nbsp;via site ou aplicativo Performa.&nbsp;As reservas podem ser realizadas pelo<strong>CLIENTE</strong>&nbsp;com 24 horas de anteced??ncia at?? o hor??rio de in??cio da atividade. De acordo com o plano contratado pode haver restri????es no acesso a determinadas atividades. Caso n??o possa comparecer, o&nbsp;<strong>CLIENTE</strong>&nbsp;deve cancelar a aula reservada pelo site ou app com at?? 1h de anteced??ncia. O&nbsp;<strong>CLIENTE&nbsp;</strong>que por 3 vezes reservar, mas n??o comparecer ??s aulas, dentro de um per??odo de 30 dias, n??o conseguir?? fazer novos agendamentos por 20 dias. A suspens??o ?? para agendamentos online, e n??o para o acesso ??&nbsp;<strong>ACADEMIA</strong>. O cliente poder?? participar de qualquer aula com vaga dispon??vel no hor??rio de in??cio.&nbsp;Para agendar avalia????o f??sica e bioimped??ncia, o<strong>CLIENTE&nbsp;</strong>tamb??m dever?? usar sistema de reservas online&nbsp;via site ou aplicativo Performa. As reservas podem ser realizadas pelo&nbsp;<strong>CLIENTE</strong>&nbsp;com 7 dias de anteced??ncia at?? o hor??rio de in??cio da atividade. Caso n??o possa comparecer, o<strong>CLIENTE</strong>&nbsp;deve cancelar a avalia????o e/ou bioimped??ncia reservada com at?? 24h de anteced??ncia. O&nbsp;<strong>CLIENTE&nbsp;</strong>que reservar e n??o comparecer a avalia????o ter?? que aguardar 45 dias para nova reserva gratuita. O&nbsp;<strong>CLIENTE&nbsp;</strong>que reservar e n??o comparecer ?? bioimped??ncia ter?? que aguardar 90 dias para nova reserva gratuita.&nbsp;A toler??ncia de atraso para o ingresso do aluno nas salas onde estiverem sendo desenvolvidas as atividades f??sicas com hor??rios pr??-estabelecidos ?? de, no m??ximo, 10 (dez) minutos, podendo a vaga ser liberada para outro cliente presente ap??s este tempo.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>DECLARA????O DE SA??DE</strong></p>
          
          <p>Para contratar os servi??os e usufruir deles o&nbsp;<strong>CLIENTE</strong>&nbsp;dever?? preencher o PAR-Q (Question??rio de Aptid??o para Atividade F??sica) e/ou apresentar atestado m??dico espec??fico para a pr??tica da (s) atividade (s) contratada(s) e renov??-lo (s) na periodicidade que vier a ser determinada pela lei aplic??vel, assim como atender a outras exig??ncias da&nbsp;<strong>ACADEMIA</strong>&nbsp;relacionadas a comprova????o e/ou entendimento das suas condi????es e limita????es para a pr??tica de atividades f??sicas. Em raz??o de exig??ncias legais e/ou para a sua seguran??a, caso o&nbsp;<strong>CLIENTE</strong>&nbsp;n??o cumpra com o disposto nesta cl??usula a&nbsp;<strong>ACADEMIA</strong>&nbsp;poder?? n??o permitir o seu acesso a academia e/ou a pr??tica de atividades f??sicas at?? a regulariza????o.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>PRAZO</strong></p>
          
          <p>Este contrato tem o prazo contratado de [NOME DO PLANO]. O plano mensal e os planos de venda direta no cart??o de cr??dito e boleto n??o se renovam automaticamente. A cada renova????o ser?? aplic??vel o Contrato de Presta????o de Servi??os de Atividades F??sicas que estiver vigente na data respectiva. Na modalidade DCC (D??bito Recorrente no Cart??o de Cr??dito) o plano ?? v??lido por&nbsp;<strong>prazo indeterminado.&nbsp;</strong>Se o&nbsp;<strong>CLIENTE</strong>&nbsp;n??o desejar renovar ao final do per??odo m??nimo contratado dever?? cancelar o contrato sem multa conforme regras descritas no item Cancelamento deste Contrato.</p>
          
          <p><strong>PAGAMENTO</strong></p>
          
          <p>A&nbsp;<strong>ACADEMIA&nbsp;</strong>oferece planos mensais, concedendo descontos sobre a mensalidade em fun????o do prazo contratado. Em raz??o dos descontos concedidos,&nbsp;<strong>em caso de cancelamento do plano antes de seu t??rmino, fica ressalvado o disposto no item&nbsp;</strong>Cancelamento deste Contrato.&nbsp;<strong>O CLIENTE somente poder?? frequentar as instala????es da ACADEMIA enquanto estiver em dia com os pagamentos, sendo que estes dever??o ser realizados independentemente da frequ??ncia ??s atividades.<strong>&nbsp;</strong></strong>Pelos servi??os ora contratados, o&nbsp;<strong>CLIENTE</strong>&nbsp;pagar?? ??&nbsp;<strong>ACADEMIA,</strong>&nbsp;al??m da taxa de matr??cula no momento da contrata????o, o valor mensal de acordo com a tabela de pre??os vigente na data da contrata????o. Nos planos mensal e venda direta no cart??o de cr??dito o valor total do plano comprometer?? o limite do cart??o de cr??dito.&nbsp;No plano&nbsp;DCC (D??bito Recorrente no Cart??o de Cr??dito) o&nbsp;valor total do plano n??o comprometer?? o limite do cart??o de cr??dito, apenas o valor mensal contar?? no limite, estando o&nbsp;<strong>CLIENTE</strong>&nbsp;sujeito ??s regras de pagamento das administradoras. Aderindo a este contrato DCC, o&nbsp;<strong>CLIENTE</strong>&nbsp;autoriza a&nbsp;<strong>ACADEMIA</strong>&nbsp;a debitar, no cart??o de cr??dito indicado, os valores mensais previstos. A autoriza????o aqui concedida ?? irrevog??vel e ter?? validade enquanto existirem valores a serem pagos, ainda que a matr??cula tenha sido cancelada e o contrato rescindido. Na hip??tese de a administradora do cart??o de cr??dito n??o autorizar a libera????o da quantia devida, o<strong>CLIENTE&nbsp;</strong>dever?? comparecer ??&nbsp;<strong>ACADEMIA</strong>&nbsp;imediatamente a fim de quitar o d??bito, podendo ser permitido ao&nbsp;<strong>CLIENTE</strong>&nbsp;apresentar outra forma de pagamento praticada pela&nbsp;<strong>ACADEMIA&nbsp;</strong>para quita????o, devendo tamb??m neste momento o&nbsp;<strong>CLIENTE</strong>&nbsp;ratificar ou indicar um novo cart??o de cr??dito, se for o caso. Para o plano&nbsp;DCC, considerando o prazo indeterminado do plano, o valor dos servi??os ser?? reajustado na periodicidade m??nima admitida em lei, atualmente anual, com base na varia????o positiva do ??ndice Geral de Pre??os ??? Mercado/IGP - M, divulgado pela Funda????o Get??lio Vargas, ou, no caso de sua extin????o ou de sua inexist??ncia por outro ??ndice que melhor reflita a perda do poder aquisitivo da moeda nacional ocorrida no per??odo.&nbsp;</p>
          
          <p>&nbsp;</p>
          
          <p><strong>INADIMPL??NCIA</strong></p>
          
          <p>O&nbsp;<strong>CLIENTE&nbsp;</strong>que estiver inadimplente ter?? o seu acesso ??&nbsp;<strong>ACADEMIA</strong>&nbsp;suspenso ap??s 5 dias do vencimento,&nbsp;at?? a quita????o do d??bito, sem direito ?? compensa????o dos dias em que esteve impedido de frequent??-la. Os valores n??o recebidos nas datas de seus vencimentos ser??o atualizados com multa de 2% do valor da mensalidade e 0,5% de juros por dia de atraso.</p>
          
          <p>Havendo atraso da mensalidade, superior a 15 dias do vencimento, a&nbsp;<strong>ACADEMIA&nbsp;</strong>fica desde j?? autorizada a:</p>
          
          <p>a) Incluir o nome do&nbsp;<strong>CLIENTE&nbsp;</strong>no SPC/Serasa;&nbsp;<br>
          <strong>b)&nbsp;</strong>Emitir t??tulos de cr??ditos contra o&nbsp;<strong>CLIENTE</strong>;&nbsp;<br>
          <strong>c)&nbsp;</strong>Ajuizar A????o Morat??ria ou A????o de Execu????o;</p>
          
          <p>Sempre que julgar necess??rio, a&nbsp;<strong>ACADEMIA&nbsp;</strong>poder?? exigir do&nbsp;<strong>CLIENTE&nbsp;</strong>a prova de quita????o das mensalidades juntamente com o documento de identifica????o emitido pela mesma.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>CANCELAMENTO</strong></p>
          
          <p><em><strong>O CLIENTE poder?? solicitar o cancelamento a qualquer momento pessoalmente e por escrito na recep????o da ACADEMIA, desde que esteja em dia com o pagamento das mensalidades ou outros d??bitos existentes. Em hip??tese alguma ser?? aceito cancelamento deste contrato por telefone ou e-mail. N??o haver?? devolu????o dos valores j?? pagos mesmo que o CLIENTE n??o tenha frequentado a ACADEMIA. Para o cancelamento do contrato antes do t??rmino de seu per??odo de vig??ncia m??nima, por iniciativa do CLIENTE ou em decorr??ncia do descumprimento, pelo CLIENTE, de suas obriga????es contratuais, ser?? devido ?? ACADEMIA o equivalente a 25% (vinte e cinco por cento) do valor das parcelas a vencer, al??m de perder o per??odo de trancamento a que tenha direito, caso este ainda n??o tenha sido usufru??do. O CLIENTE declara-se ciente que, no caso dos planos pagos com cart??o de cr??dito, caso deseje efetuar o cancelamento&nbsp;dever?? faz??-lo pessoalmente na academia com anteced??ncia m??nima de 40 (quarenta) dias da data prevista para a ocorr??ncia do pr??ximo d??bito, sendo certo que, caso o CLIENTE solicite o cancelamento em prazo inferior, a ACADEMIA n??o efetuar?? a devolu????o do (s) valor(es) correspondente(s) aos d??bitos devidos deste prazo de 40 (quarenta) dias.&nbsp;A ACADEMIA poder?? rescindir o contrato de presta????o de servi??os de forma unilateral, caso o CLIENTE atue nas depend??ncias da ACADEMIA de forma indisciplinada ou de forma que denigra a imagem da ACADEMIA.&nbsp;</strong></em></p>
          
          <p>&nbsp;</p>
          
          <p><strong>TRANCAMENTO</strong></p>
          
          <p>A&nbsp;<strong>ACADEMIA</strong>&nbsp;oferece a op????o de trancamento por determinado per??odo (m??nimo de sete dias), devendo o&nbsp;<strong>CLIENTE</strong>, para usufruir deste direito, comunicar o interesse ?? recep????o da&nbsp;<strong>ACADEMIA</strong>&nbsp;com anteced??ncia m??nima de um dia, atrav??s de formul??rio espec??fico, sendo que o&nbsp;<strong>CLIENTE</strong>&nbsp;n??o poder?? frequentar a academia durante este per??odo. 1. Plano Trimestral - interrup????o de 7 dias corridos; (2) Plano Semestral - interrup????o total de 15 dias; (3) Plano Anual - interrup????o total de 30 dias; Plano 18 Meses - interrup????o total de 45 dias; Plano 24 Meses ??? interrup????o total de 60 dias. N??o h?? trancamento para o plano mensal. Durante o trancamento da matr??cula, o&nbsp;<strong>CLIENTE</strong>&nbsp;pagar?? normalmente as mensalidades nos respectivos vencimentos e ganhar?? cr??ditos em dias pagos e n??o frequentados ao final do contrato. N??O S??O PERMITIDOS PEDIDOS RETROATIVOS OU ADICIONAIS DE TRANCAMENTO.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>CESS??O DE DIREITO DE USO</strong></p>
          
          <p>O&nbsp;<strong>CLIENTE</strong>&nbsp;que n??o pretende mais utilizar seu plano pode ceder o direito de utiliza????o dos servi??os e instala????es da&nbsp;<strong>ACADEMIA</strong>&nbsp;para outra pessoa, mediante requisi????o escrita feita na recep????o da&nbsp;<strong>ACADEMIA</strong>, e sujeito ?? aprova????o da&nbsp;<strong>ACADEMIA</strong>. O&nbsp;<strong>CLIENTE</strong>&nbsp;n??o deixa de ser o respons??vel financeiro pelo plano, sendo que TODOS os pagamentos devidos continuam sob sua responsabilidade. No momento da transfer??ncia, o titular do plano n??o pode ceder o per??odo de trancamento a que tenha direito, caso este ainda n??o tenha sido usufru??do. Na cess??o de uso, a pessoa a quem for cedido o direito far?? jus ?? utiliza????o dos dias vincendos, considerado tal per??odo como a diferen??a entre a quantidade de dias decorridos desde o in??cio da vig??ncia do plano e o per??odo total inicialmente contratado. Caso a pessoa que recebeu o direito de cess??o de uso j?? seja&nbsp;<strong>CLIENTE</strong>&nbsp;da&nbsp;<strong>ACADEMIA</strong>dever?? cumprir seu plano at?? o final e somente depois passar?? a usufruir o direito de uso cedido, sendo-lhe creditados os dias vincendos do cedente e vetado efetuar nova cess??o de direito de uso dos dias recebidos. Caso a pessoa que vier a receber o direito de cess??o de uso n??o seja aluno matriculado na&nbsp;<strong>ACADEMIA,&nbsp;</strong>ficar?? ela obrigada a cumprir todas as normas da&nbsp;<strong>ACADEMIA,&nbsp;</strong>devendo arcar com as despesas referentes ?? taxa de matr??cula, sendo-lhe vetado efetuar nova cess??o de direito de uso dos dias recebidos.&nbsp;&nbsp;A&nbsp;<strong>ACADEMIA&nbsp;</strong>n??o interfere e nem intermedia a CESS??O DE DIREITO DE USO e est?? isenta de qualquer responsabilidade no acordo entre as partes.&nbsp;</p>
          
          <p>&nbsp;</p>
          
          <p><strong>NORMAS DE CONDUTA</strong></p>
          
          <p><strong>?? expressamente proibida qualquer conduta do aluno que n??o esteja de acordo com o objeto deste instrumento, que seja contr??ria ?? moral e aos bons costumes ou que, por qualquer forma, cause perturba????o ao ambiente da ACADEMIA, aos funcion??rios, instrutores, professores ou frequentadores, como, exemplificativamente</strong>: (I) uso inadequado ou impr??prio dos equipamentos; (II) atos ou atitudes que perturbem outros clientes e que pelos mesmos sejam repelidas; (III) atitudes agressivas com outros clientes ou com funcion??rios da academia; (IV) a comercializa????o de produtos ou servi??os nas depend??ncias da academia.</p>
          
          <p>Al??m das condutas acima referidas, a&nbsp;<strong>ACADEMIA&nbsp;</strong>reserva-se ao direito de considerar como inadequadas e proibidas outras condutas que n??o estejam de acordo com o objeto deste instrumento. ?? vetado ao&nbsp;<strong>CLIENTE</strong>&nbsp;retirar equipamentos ou qualquer outro bem de propriedade da&nbsp;<strong>ACADEMIA&nbsp;</strong>de suas instala????es. O&nbsp;<strong>CLIENTE</strong>&nbsp;deve zelar e utilizar adequadamente os equipamentos e bens da&nbsp;<strong>ACADEMIA</strong>, ficando obrigado a reparar quaisquer danos por ele causados a equipamentos, funcion??rios e/ou terceiros, podendo ter as suas atividades suspensas at?? a efetiva repara????o do dano.&nbsp;<strong>OS DANOS DE QUALQUER NATUREZA DECORRENTES DE ATIVIDADES&nbsp;</strong><strong>EXECUTADAS SEM A SOLICITA????O DE ORIENTA????O OU COM INOBSERV??NCIA DAS INSTRU????ES DOS PROFESSORES DA ACADEMIA N??O SER??O DE RESPONSABILIDADE DA MESMA E CARACTERIZAR??O CULPA EXCLUSIVA DO CLIENTE.&nbsp;</strong>O aluno que cometer qualquer atitude, ofensa, agress??o f??sica e demais atos que infrinjam a lei e/ou que resultem em preju??zo para a academia, dever?? ressarcir a mesma. N??o ?? permitido o uso de qualquer outro cal??ado que n??o seja t??nis para a pr??tica dos exerc??cios, salvo em modalidades espec??ficas. Para que os movimentos sejam executados com exatid??o, ?? vetado se exercitar com roupas jeans, cargo ou social. Os trajes adequados s??o: shorts, cal??as de agasalho ou moletom, camiseta ou regata.&nbsp;<strong>A ACADEMIA&nbsp;</strong>pode impedir a participa????o de aluno em aula que n??o lhe seja recomendada pela sua avalia????o f??sica, m??dica ou se o aluno n??o estiver devidamente trajado e/ou equipado. A toler??ncia de atraso para o ingresso do aluno nas salas onde s??o realizadas atividades coletivas com hor??rios pr??-estabelecidos ?? de, no m??ximo, dez minutos.&nbsp;&nbsp;?? vetada a entrada e a circula????o de animais na academia.&nbsp;&nbsp;N??o ?? permitido fumar ou ingerir bebida alco??lica no interior da academia.&nbsp;?? terminantemente proibido o ingresso de pessoas portando armas de fogo no interior da academia.&nbsp;Somente est??o autorizados a exercer a atividade de&nbsp;<em>personal trainer</em>, os profissionais devidamente cadastrados junto ?? academia, sendo que&nbsp;<strong>n??o ser?? permitida, em hip??tese alguma, a atua????o do aluno de forma a caracterizar trabalho como instrutor e/ou personal trainer</strong>.&nbsp;N??o ?? permitido filmar ou fotografar o interior da academia e das aulas, salvo mediante autoriza????o expressa da Dire????o.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>DESCUMPRIMENTO DE NORMAS</strong></p>
          
          <p>O&nbsp;<strong>CLIENTE</strong>&nbsp;que mantiver conduta em desacordo com o objeto deste contrato, estar?? sujeito ?? advert??ncia verbal e/ou cancelamento de sua matr??cula com rescis??o antecipada do contrato ou a n??o renova????o do mesmo, a crit??rio da&nbsp;<strong>ACADEMIA</strong>. O&nbsp;<strong>CLIENTE</strong>&nbsp;que praticar, no interior da academia, atos de agress??o f??sica, amea??a, venda de subst??ncias il??citas, roubo, furto e outros que configurem il??citos penais, bem como atos cuja gravidade justifique tal medida, a crit??rio da ???<strong>ACADEMIA</strong>???, estar?? sujeito ?? rescis??o imediata e permanente do contrato e ao ressarcimento de perdas e danos causados ?????&nbsp;<strong>ACADEMIA</strong>&nbsp;e/ou terceiros. Ocorrendo a rescis??o de que trata os itens acima, a ???<strong>ACADEMIA&nbsp;</strong>far?? jus ao recebimento de multa de 25% do valor dos meses vincendos, conforme previsto no item que trata do Cancelamento.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>RESPONSABILIDADE POR BENS DO CLIENTE</strong></p>
          
          <p><strong>A&nbsp;ACADEMIA&nbsp;n??o se responsabiliza pela perda, dano ou extravio de objetos e pertences pessoais ou de valor nas suas depend??ncias</strong>. A utiliza????o do guarda-volumes&nbsp;<strong>n??o implica em dever de guarda da ACADEMIA</strong>, sendo vetado ao&nbsp;<strong>CLIENTE</strong>&nbsp;deixar seus pertences nos vesti??rios ap??s a sa??da da academia.&nbsp;<strong>Para a utiliza????o dos arm??rios no vesti??rio masculino,</strong>&nbsp;<strong>por quest??es de sua pr??pria seguran??a e inviolabilidade do arm??rio, o CLIENTE deve utilizar cadeado de sua propriedade</strong>, ficando a&nbsp;<strong>ACADEMIA&nbsp;</strong>isenta de qualquer responsabilidade sobre o material deixado no arm??rio.&nbsp;<strong>No vesti??rio feminino, a CLIENTE dever?? criar uma senha eletr??nica nova todos os dias, obedecendo ??s normas de seguran??a conforme manual de instru????es afixado no mural do vesti??rio</strong>, ficando a&nbsp;???<strong>ACADEMIA&nbsp;</strong>isenta de qualquer responsabilidade caso tal procedimento n??o seja obedecido.&nbsp;A utiliza????o do arm??rio ?? permitida somente durante a perman??ncia do cliente na academia e os arm??rios encontrados fechados ap??s o hor??rio de funcionamento ser??o abertos e os objetos neles contidos ser??o encaminhados ??s autoridades competentes, sem direito a indeniza????o.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>IMAGEM&nbsp;&nbsp;</strong><br>
          O&nbsp;<strong>CLIENTE</strong>, neste ato, autoriza que a&nbsp;<strong>ACADEMIA&nbsp;</strong>se utilize dos meios eletr??nicos (e-mail, telefone, mensagens SMS) com o objetivo de enviar not??cias, avisos, dicas, promo????es e outras informa????es relevantes acerca do funcionamento da academia. O presente instrumento constitui autoriza????o de uso da imagem, permitindo a utiliza????o da imagem do&nbsp;<br>
          <strong>CLIENTE</strong>&nbsp;pela&nbsp;<strong>ACADEMIA&nbsp;</strong>em qualquer suporte material apto a reprodu????o de imagens ou imagens conjugadas com som, podendo, tais como ???home-video???, ???v??deo-laser disc???, ???digital video disc??? (DVD) e similares; ???CD-ROM???; rede internet, e outros, bem como ser difundida atrav??s de quaisquer meios como proje????o, transmiss??o, difus??o e divulga????o e, ainda, em quaisquer processos e ve??culos de reprodu????o, exibi????o, existentes no Brasil e no exterior, al??m da inclus??o da imagem do aluno em cat??logos e folhetos e demais materiais gr??ficos que tenham a finalidade de divulgar a&nbsp;<strong>ACADEMIA</strong>. A presente autoriza????o se d?? sem quaisquer ??nus ou restri????es de territ??rio, tempo, n??mero de exibi????es e exemplares que venham a ser distribu??dos.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>CONTRATA????O ELETR??NICA</strong></p>
          
          <p><strong>A ades??o ao presente contrato poder?? ocorrer de forma eletr??nica, atrav??s do website, tablets, seu celular, totens ou outros dispositivos eletr??nicos. Ao contratar este servi??o de atividades f??sicas o CLIENTE manifesta sua ci??ncia e concord??ncia com os termos do presente contrato, assim como declara-se ciente e de acordo de que a ACADEMIA no processo de ades??o poder?? efetuar a coleta e armazenamento de seus dados biom??tricos e informa????es pessoais, bem como de registros de suas a????es, necess??rios para a comprova????o de validade desta contrata????o.&nbsp;</strong></p>
          
          <p><br>
          <strong>DISPOSI????ES FINAIS</strong></p>
          
          <p>As normas constantes dos avisos e orienta????es afixados no interior das instala????es da academia, que n??o estiverem contempladas neste contrato, passam a fazer parte integrante do mesmo, sendo certo que o seu n??o cumprimento poder?? acarretar na rescis??o antecipada ou a n??o renova????o do mesmo. Toda e qualquer sugest??o, reclama????o ou altera????o dever?? ser encaminhada, por escrito, ?? dire????o da&nbsp;<strong>ACADEMIA</strong>, que analisar?? cada caso conforme crit??rios estabelecidos. Os casos omissos neste contrato dever??o ser analisados pela dire????o da&nbsp;<strong>ACADEMIA</strong>.</p>
          
          <p>&nbsp;</p>
          
          <p><strong>Declaro que li integralmente este&nbsp;</strong><strong>Contrato&nbsp;de Presta????o de Servi??os de&nbsp;Atividades F??sicas, entendi e concordo com todas as cl??usulas e condi????es.</strong></p>
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
           <h1>ENDERE??O</h1>
            <p>Pra??a da Bandeira, Zona Norte, Rio de Janeiro</p>
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