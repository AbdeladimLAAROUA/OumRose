 <div class="row" id="content" >
      <form class="col s12 m8 offset-m2 l6 offset-l3 left-alert" id="myForm" novalidate="novalidate">
      <ul class="collapsible collapsible-expandable" data-collapsible="expandable">
        

      <li id="libaby0"  >
        <div id="headbaby" class="collapsible-header teal lighten-2 white-text waves-effect waves-light active" style="font-size: 25px;"><!-- <i class="material-icons">child_care</i>  -->Inscription</div>
            <div class="collapsible-body" style="display: block;">
            <div class="row">
             <div class="input-field col s12" >
              <span class="micons-mail prefix"></span>
              <input id="email" type="email" name="EMAIL" class="validate" required="required" aria-required="true" pattern="^.*@[a-zA-Z\.]+\.[a-zA-Z]{2,}$">
              <label id="labelEmail" for="email" data-error="email invalide" data-success="" class="">Email</label>
            </div>
            <div class="input-field col s6">
              <span class="micons-padlock prefix"></span>
              <input id="password" type="password" name="PASSWORD" pattern=".{2,}" minlength="6" class="validate" required="required" aria-required="true">
              <label id="labelPassword" for="password" data-error="invalide" class="">Mot de passe</label>
            </div>
            <div class="input-field col s6">
              <input id="passconf" name="passconf" type="password" class="validate" required="required" aria-required="true">
              <label id="labelPassconf" for="passconf" data-error="Password incorrect" class="">Confirmation du mot de passe</label>
            </div>
            <!-- <div class="sparator">
              <label>Ou</label>
            </div>
            <div class="col s6 text-center">
               <button type="button" class="btn btn-primary signupFB" >S'inscrire avec Facebook</button>
            </div>
             <div class="col s6 text-center">
               <button type="button" class="btn btn-primary signupGmail">S'inscrire avec Gmail</button>
            </div> -->
             <div class="col s12 text-center">
               <button type="button" class="btn btn-primary continueBtn">Continuer</button>
            </div>

        </div>
      </div>
    </li>


       <li class="active maman" hidden>
      <div class="collapsible-header pink lighten-2 white-text waves-effect waves-light active"><i class="material-icons">face</i> Maman</div>
      <div class="collapsible-body" style="display: block;">
        <div class="row">

        <!--  <div class="input-field col s12 part1" >
          <span class="micons-mail prefix"></span>
          <input id="email" type="email" name="EMAIL" class="validate" required="true" aria-required="true" pattern="^.*@[a-zA-Z\.]+\.[a-zA-Z]{2,}$">
          <label for="email" data-error="email invalide" data-success="" class="">Email</label>
        </div>
        <div class="input-field col s6 part1" >
          <span class="micons-padlock prefix"></span>
          <input id="password" type="password" name="PASSWORD" pattern=".{2,}" minlength="6" class="validate" required="required" aria-required="true">
          <label for="password" data-error="invalide" class="">Password</label>
        </div>
        <div class="input-field col s6 part1">
          <input id="passconf" name="passconf" type="password" pattern=".{2,}" minlength="6" class="validate" required="required" aria-required="true">
          <label for="passconf" data-error="Password incorrect" class="">Confirmation</label>
        </div> -->
        <div class="input-field col s6">
        <span class="micons-user prefix"></span>
          <input id="prenom" type="text" name="PRENOM" pattern=".{2,}" minlength="2" class="validate" required="required" aria-required="true">
          <label id="labelPrenom"for="prenom" data-error="invalide" class="">Prénom</label>
        </div>
        <div class="input-field col s6">
          <input id="nom" name="NOM" type="text" pattern=".{2,}" minlength="2" class="validate" required="required" aria-required="true">
          <label id="labelNom" for="nom" data-error="invalide" class="">Nom de famille</label>
        </div>
         <div class="input-field col s6">
        <span class="micons-mobile prefix"></span>
          <input id="gsm" name="GSM" type="text" pattern="^(0|00\s?212\s?|\(?\+212\)?\s?(\(0\))?)[67]([\s\-\.]?[0-9]{2}){4}$" class="validate" required="required" aria-required="true">
          <label id="labelGsm" for="gsm" data-error="numéro invalide" class="">Tél. portable</label>
         </div>

        <div class="input-field col s6">
          <span class="micons-calendar prefix"></span>
          <input id="naissance" name="DATE_NAISSANCE" class="datepicker  picker__input" placeholder="Date de naissance" required="required" readonly="" tabindex="-1" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="naissance_root" aria-required="true"><label for="naissance"></label><div class="picker" id="naissance_root" tabindex="0" aria-hidden="true"><div class="picker__holder"><div class="picker__frame"><div class="picker__wrap"><div class="picker__box"><div class="picker__date-display"><div class="picker__weekday-display">mardi</div><div class="picker__month-display"><div>mai</div></div><div class="picker__day-display"><div>9</div></div><div class="picker__year-display"><div>1987</div></div></div><div class="picker__calendar-container"><div class="picker__header"><select class="picker__select--month browser-default" aria-controls="naissance_table" title="Choisir un mois" disabled="disabled"><option value="0">janvier</option><option value="1">février</option><option value="2">mars</option><option value="3">avril</option><option value="4" selected="">mai</option><option value="5">juin</option><option value="6">juillet</option><option value="7">août</option><option value="8">septembre</option><option value="9">octobre</option><option value="10">novembre</option><option value="11">décembre</option></select><select class="picker__select--year browser-default" aria-controls="naissance_table" title="Choisir une année" disabled="disabled"><option value="1965">1965</option><option value="1966">1966</option><option value="1967">1967</option><option value="1968">1968</option><option value="1969">1969</option><option value="1970">1970</option><option value="1971">1971</option><option value="1972">1972</option><option value="1973">1973</option><option value="1974">1974</option><option value="1975">1975</option><option value="1976">1976</option><option value="1977">1977</option><option value="1978">1978</option><option value="1979">1979</option><option value="1980">1980</option><option value="1981">1981</option><option value="1982">1982</option><option value="1983">1983</option><option value="1984">1984</option><option value="1985">1985</option><option value="1986">1986</option><option value="1987" selected="">1987</option><option value="1988">1988</option><option value="1989">1989</option><option value="1990">1990</option><option value="1991">1991</option><option value="1992">1992</option><option value="1993">1993</option><option value="1994">1994</option><option value="1995">1995</option><option value="1996">1996</option><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option></select><div class="picker__nav--prev" data-nav="-1" role="button" aria-controls="naissance_table" title="Mois précédent"> </div><div class="picker__nav--next" data-nav="1" role="button" aria-controls="naissance_table" title="Mois prochain"> </div></div><table class="picker__table" id="naissance_table" role="grid" aria-controls="naissance" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="lundi">L</th><th class="picker__weekday" scope="col" title="mardi">M</th><th class="picker__weekday" scope="col" title="mercredi">M</th><th class="picker__weekday" scope="col" title="jeudi">J</th><th class="picker__weekday" scope="col" title="vendredi">V</th><th class="picker__weekday" scope="col" title="samedi">S</th><th class="picker__weekday" scope="col" title="dimanche">D</th></tr></thead><tbody><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="546476400000" role="gridcell" aria-label="27/04/1987">27</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="546562800000" role="gridcell" aria-label="28/04/1987">28</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="546649200000" role="gridcell" aria-label="29/04/1987">29</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="546735600000" role="gridcell" aria-label="30/04/1987">30</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="546822000000" role="gridcell" aria-label="01/05/1987">1</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="546908400000" role="gridcell" aria-label="02/05/1987">2</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="546994800000" role="gridcell" aria-label="03/05/1987">3</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547081200000" role="gridcell" aria-label="04/05/1987">4</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547167600000" role="gridcell" aria-label="05/05/1987">5</div></td><td role="presentation"><div class="picker__day picker__day--infocus picker__day--highlighted" data-pick="547254000000" role="gridcell" aria-label="06/05/1987" aria-activedescendant="true">6</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547340400000" role="gridcell" aria-label="07/05/1987">7</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547426800000" role="gridcell" aria-label="08/05/1987">8</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547513200000" role="gridcell" aria-label="09/05/1987">9</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547599600000" role="gridcell" aria-label="10/05/1987">10</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547686000000" role="gridcell" aria-label="11/05/1987">11</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547772400000" role="gridcell" aria-label="12/05/1987">12</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547858800000" role="gridcell" aria-label="13/05/1987">13</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="547945200000" role="gridcell" aria-label="14/05/1987">14</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548031600000" role="gridcell" aria-label="15/05/1987">15</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548118000000" role="gridcell" aria-label="16/05/1987">16</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548204400000" role="gridcell" aria-label="17/05/1987">17</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548290800000" role="gridcell" aria-label="18/05/1987">18</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548377200000" role="gridcell" aria-label="19/05/1987">19</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548463600000" role="gridcell" aria-label="20/05/1987">20</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548550000000" role="gridcell" aria-label="21/05/1987">21</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548636400000" role="gridcell" aria-label="22/05/1987">22</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548722800000" role="gridcell" aria-label="23/05/1987">23</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548809200000" role="gridcell" aria-label="24/05/1987">24</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548895600000" role="gridcell" aria-label="25/05/1987">25</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="548982000000" role="gridcell" aria-label="26/05/1987">26</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="549068400000" role="gridcell" aria-label="27/05/1987">27</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="549154800000" role="gridcell" aria-label="28/05/1987">28</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="549241200000" role="gridcell" aria-label="29/05/1987">29</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="549327600000" role="gridcell" aria-label="30/05/1987">30</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="549414000000" role="gridcell" aria-label="31/05/1987">31</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="549500400000" role="gridcell" aria-label="01/06/1987">1</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="549586800000" role="gridcell" aria-label="02/06/1987">2</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="549673200000" role="gridcell" aria-label="03/06/1987">3</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="549759600000" role="gridcell" aria-label="04/06/1987">4</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="549846000000" role="gridcell" aria-label="05/06/1987">5</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="549932400000" role="gridcell" aria-label="06/06/1987">6</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="550018800000" role="gridcell" aria-label="07/06/1987">7</div></td></tr></tbody></table></div><div class="picker__footer"><button class="btn-flat picker__today" type="button" data-pick="1494284400000" aria-controls="naissance" disabled="disabled">Aujourd'hui</button><button class="btn-flat picker__clear" type="button" data-clear="1" aria-controls="naissance" disabled="disabled">RAZ</button><button class="btn-flat picker__close" type="button" data-close="true" aria-controls="naissance" disabled="disabled">OK</button></div></div></div></div></div></div><input type="hidden" name="DATE_NAISSANCE2">
          <label id="labelNaissance" for="naissance"></label>
        </div>
        <div class="input-field col s12">
        <span class="micons-sign prefix"></span>
                <!-- <textarea id="adresse" name="ADRESSE" type="text" minlength="4"  pattern=".{4,}" class="materialize-textarea validate"></textarea>
                  <label id="labelAdresse" for="adresse" data-error="adresse incomplète" class="">Adresse</label> -->
         <input id="adresse" type="text" name="ADRESSE" minlength="5"  required="required" aria-required="true">
          <label id="labelAdresse" for="adresse" data-error="email invalide" data-success="" class="">Adresse</label>
        </div>
        <div class="input-field col s8 selectCity">
          <span class="micons-building prefix"></span>
          <!-- <input id="city" name="VILLE" type="text" pattern=".{3,}" minlength="3" required="required" class="validate" aria-required="true"> -->
          <select id="ville" name="VILLE" class="initialized" required="required" aria-required="true">
            <option value="0" disabled="" selected=>Ville</option>
            <?php
              include('config.php');
              $villes = getAllCities2($conn);
              foreach ($villes as $key => $ville) {
             ?>
                <option value="<?php echo $ville['id'] ?>"><?php echo $ville['name'] ?></option>
            <?php
              }
            ?>
          </select>
          <span>Champ obligatoire</span>
        </div>
        <div class="input-field col s4">
          <!-- <input id="zip" name="CP" type="text" pattern="\d{1}" required="required" aria-required="true"> -->
          <select id="zip" name="CP" class="initialized" style="display: none;">
            <option value="" disabled="" selected="">Nombre d'enfant</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
          </select>
          <!-- <label id="labelZip"  for="zip" data-error="Nombre invalide" data-success="" class="">Nombre d'enfant</label> -->
        </div>
         <div class="input-field col s6">

          <input id="mom1" type="radio" name="TYPE" value="enceinte" class="validate" required="required" onchange="update_baby()" aria-required="true">
          <label for="mom1" data-error="email invalide" data-success="">Je suis enceinte</label>
                </div>   
                 <div class="input-field col s6">
          <input id="mom2" type="radio" name="TYPE" value="maman" class="validate" required="required" onchange="update_baby()" aria-required="true">
          <label for="mom2" data-error="email invalide" data-success="">Bébé est là</label>
        </div>   
       </div>
</div></li>
<li id="libaby" hidden >
    <div id="headbaby" class="collapsible-header teal lighten-2 white-text waves-effect waves-light active"><i class="material-icons">child_care</i> Bébé</div>
    <div class="collapsible-body" style="display: block;">
    <div class="row">


    <div class="input-field col s12">
      <span class="micons-calendar prefix"></span>
      <input id="accouchement" name="NAISSANCE_BEBE" class="datepicker picker__input" placeholder="Date prévue d&#39;accouchement" required="required" readonly="" tabindex="-1" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="accouchement_root" aria-required="true"><label for="accouchement"></label>
      <div class="picker" id="accouchement_root" tabindex="0" aria-hidden="true"><div class="picker__holder"><div class="picker__frame"><div class="picker__wrap"><div class="picker__box"><div class="picker__date-display"> <div class="picker__weekday-display">mardi</div><div class="picker__month-display"><div>sept</div></div><div class="picker__day-display"><div>9</div></div><div class="picker__year-display"><div>2017</div></div></div><div class="picker__calendar-container"><div class="picker__header"><select class="picker__select--month browser-default" disabled="" aria-controls="accouchement_table" title="Choisir un mois"><option value="0" disabled="">janvier</option><option value="1" disabled="">février</option><option value="2" disabled="">mars</option><option value="3">avril</option><option value="4">mai</option><option value="5">juin</option><option value="6">juillet</option><option value="7">août</option><option value="8" selected="">septembre</option><option value="9">octobre</option><option value="10">novembre</option><option value="11">décembre</option></select><select class="picker__select--year browser-default" disabled="" aria-controls="accouchement_table" title="Choisir une année"><option value="2017" selected="">2017</option><option value="2018">2018</option></select><div class="picker__nav--prev" data-nav="-1" role="button" aria-controls="accouchement_table" title="Mois précédent"> </div><div class="picker__nav--next" data-nav="1" role="button" aria-controls="accouchement_table" title="Mois prochain"> </div></div><table class="picker__table" id="accouchement_table" role="grid" aria-controls="accouchement" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="lundi">L</th><th class="picker__weekday" scope="col" title="mardi">M</th><th class="picker__weekday" scope="col" title="mercredi">M</th><th class="picker__weekday" scope="col" title="jeudi">J</th><th class="picker__weekday" scope="col" title="vendredi">V</th><th class="picker__weekday" scope="col" title="samedi">S</th><th class="picker__weekday" scope="col" title="dimanche">D</th></tr></thead><tbody><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1503874800000" role="gridcell" aria-label="28/08/2017">28</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1503961200000" role="gridcell" aria-label="29/08/2017">29</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1504047600000" role="gridcell" aria-label="30/08/2017">30</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1504134000000" role="gridcell" aria-label="31/08/2017">31</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1504220400000" role="gridcell" aria-label="01/09/2017">1</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1504306800000" role="gridcell" aria-label="02/09/2017">2</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1504393200000" role="gridcell" aria-label="03/09/2017">3</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1504479600000" role="gridcell" aria-label="04/09/2017">4</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1504566000000" role="gridcell" aria-label="05/09/2017">5</div></td><td role="presentation"><div class="picker__day picker__day--infocus picker__day--highlighted" data-pick="1504652400000" role="gridcell" aria-label="06/09/2017" aria-activedescendant="true">6</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1504738800000" role="gridcell" aria-label="07/09/2017">7</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1504825200000" role="gridcell" aria-label="08/09/2017">8</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1504911600000" role="gridcell" aria-label="09/09/2017">9</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1504998000000" role="gridcell" aria-label="10/09/2017">10</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505084400000" role="gridcell" aria-label="11/09/2017">11</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505170800000" role="gridcell" aria-label="12/09/2017">12</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505257200000" role="gridcell" aria-label="13/09/2017">13</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505343600000" role="gridcell" aria-label="14/09/2017">14</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505430000000" role="gridcell" aria-label="15/09/2017">15</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505516400000" role="gridcell" aria-label="16/09/2017">16</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505602800000" role="gridcell" aria-label="17/09/2017">17</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505689200000" role="gridcell" aria-label="18/09/2017">18</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505775600000" role="gridcell" aria-label="19/09/2017">19</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505862000000" role="gridcell" aria-label="20/09/2017">20</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1505948400000" role="gridcell" aria-label="21/09/2017">21</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1506034800000" role="gridcell" aria-label="22/09/2017">22</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1506121200000" role="gridcell" aria-label="23/09/2017">23</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1506207600000" role="gridcell" aria-label="24/09/2017">24</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1506294000000" role="gridcell" aria-label="25/09/2017">25</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1506380400000" role="gridcell" aria-label="26/09/2017">26</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1506466800000" role="gridcell" aria-label="27/09/2017">27</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1506553200000" role="gridcell" aria-label="28/09/2017">28</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1506639600000" role="gridcell" aria-label="29/09/2017">29</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1506726000000" role="gridcell" aria-label="30/09/2017">30</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1506812400000" role="gridcell" aria-label="01/10/2017">1</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1506898800000" role="gridcell" aria-label="02/10/2017">2</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1506985200000" role="gridcell" aria-label="03/10/2017">3</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1507071600000" role="gridcell" aria-label="04/10/2017">4</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1507158000000" role="gridcell" aria-label="05/10/2017">5</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1507244400000" role="gridcell" aria-label="06/10/2017">6</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1507330800000" role="gridcell" aria-label="07/10/2017">7</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1507417200000" role="gridcell" aria-label="08/10/2017">8</div></td></tr></tbody></table></div><div class="picker__footer"><button class="btn-flat picker__today" type="button" data-pick="1494284400000" disabled="" aria-controls="accouchement">Aujourd'hui</button><button class="btn-flat picker__clear" type="button" data-clear="1" disabled="" aria-controls="accouchement">RAZ</button><button class="btn-flat picker__close" type="button" data-close="true" disabled="" aria-controls="accouchement">OK</button></div></div></div></div></div></div><input type="hidden" name="NAISSANCE_BEBE2">
      <label id="accouchementLabel" for="accouchement"></label>
    </div>
      <div class="input-field col s7" id="divprenombebe" style="display: none;">
      <span class="micons-user prefix"></span>
      <input id="prenombebe" type="text" name="PRENOM_BEBE" pattern=".{2,}" minlength="2" required="" class="validate" aria-required="true">
      <label for="prenombebe" data-error="Champ obligatoire">Prénom</label>
      </div>
    <div class="input-field col s5" id="divsex" style="display: none;">
    <span class="fa fa-venus-mars prefix"></span>

    <div class="select-wrapper">
    <span class="caret">▼</span><input type="text" class="select-dropdown" readonly="true" data-activates="select-options-677afea1-502a-067a-aa73-df57f305e464" value="Sexe" pattern=".{5,}"><ul id="select-options-677afea1-502a-067a-aa73-df57f305e464" class="dropdown-content select-dropdown "><li class="disabled "><span>Sexe</span></li><li class=""><span>Garçon</span></li><li class=""><span>Fille</span></li></ul>

    <select id="sexe" name="SEXE_BEBE" class="initialized">
      <option value="" disabled="" selected="">Sexe</option>
      <option value="G">Garçon</option>
      <option value="F">Fille</option>
    </select>
    <span>Champ obligatoire</span>
    </div>
    </div>
      <div class="input-field col s7" id="divmat">
      <span class="fa fa-hospital-o prefix"></span>
      <input id="mat" required="required" name="MATERNITE" type="text" pattern=".{5,}" minlength="5" class="validate">
      <label id="labelMat" for="mat" data-error="nom incomplet">Clinique</label>
      </div>




    <div class="input-field col s5" id="divgyn">
    <input id="gyn" name="GYNECO" type="text" pattern=".{3,}" minlength="3" class="validate">
    <label for="gyn" data-error="nom incomplet">Gynécologue</label>
    </div>
  
</div>
<!-- <div class="row">
  <div class="switch col s12">
                     
                    <label>
                      J'ai un autre enfant de moins de 1 an
                      <input id="other" type="checkbox" onchange="update_child()">
                      <span class="lever"></span> 
                    </label>
                  </div>
</div> -->
      </div>
    </li>
    <li id="lichild" hidden="">
    <div id="headchild" class="collapsible-header light-blue lighten-2 white-text waves-effect waves-light"><i class="material-icons">child_care</i> Enfant</div>
    <div class="collapsible-body">
    <div class="row">
    <div class="input-field col s12">
        <span class="micons-calendar prefix"></span>
        <input id="dateenfant" name="" class="datepicker picker__input" placeholder="Date de naissance" required="required" readonly="" tabindex="-1" aria-haspopup="true" aria-expanded="false" aria-readonly="false" aria-owns="dateenfant_root" aria-required="true"><label for="dateenfant" data-error="Champ obligatoire"></label><div class="picker" id="dateenfant_root" tabindex="0" aria-hidden="true"><div class="picker__holder"><div class="picker__frame"><div class="picker__wrap"><div class="picker__box"><div class="picker__date-display"><div class="picker__weekday-display">mardi</div><div class="picker__month-display"><div>mai</div></div><div class="picker__day-display"><div>9</div></div><div class="picker__year-display"><div>2017</div></div></div><div class="picker__calendar-container"><div class="picker__header"><select class="picker__select--month browser-default" disabled="" aria-controls="dateenfant_table" title="Choisir un mois"><option value="0">janvier</option><option value="1">février</option><option value="2">mars</option><option value="3">avril</option><option value="4" selected="">mai</option><option value="5">juin</option><option value="6">juillet</option><option value="7">août</option><option value="8">septembre</option><option value="9">octobre</option><option value="10">novembre</option><option value="11">décembre</option></select><select class="picker__select--year browser-default" disabled="" aria-controls="dateenfant_table" title="Choisir une année"><option value="1997">1997</option><option value="1998">1998</option><option value="1999">1999</option><option value="2000">2000</option><option value="2001">2001</option><option value="2002">2002</option><option value="2003">2003</option><option value="2004">2004</option><option value="2005">2005</option><option value="2006">2006</option><option value="2007">2007</option><option value="2008">2008</option><option value="2009">2009</option><option value="2010">2010</option><option value="2011">2011</option><option value="2012">2012</option><option value="2013">2013</option><option value="2014">2014</option><option value="2015">2015</option><option value="2016">2016</option><option value="2017" selected="">2017</option><option value="2018">2018</option><option value="2019">2019</option><option value="2020">2020</option><option value="2021">2021</option><option value="2022">2022</option><option value="2023">2023</option><option value="2024">2024</option><option value="2025">2025</option><option value="2026">2026</option><option value="2027">2027</option><option value="2028">2028</option><option value="2029">2029</option><option value="2030">2030</option><option value="2031">2031</option><option value="2032">2032</option><option value="2033">2033</option><option value="2034">2034</option><option value="2035">2035</option><option value="2036">2036</option><option value="2037">2037</option></select><div class="picker__nav--prev" data-nav="-1" role="button" aria-controls="dateenfant_table" title="Mois précédent"> </div><div class="picker__nav--next" data-nav="1" role="button" aria-controls="dateenfant_table" title="Mois prochain"> </div></div><table class="picker__table" id="dateenfant_table" role="grid" aria-controls="dateenfant" aria-readonly="true"><thead><tr><th class="picker__weekday" scope="col" title="lundi">L</th><th class="picker__weekday" scope="col" title="mardi">M</th><th class="picker__weekday" scope="col" title="mercredi">M</th><th class="picker__weekday" scope="col" title="jeudi">J</th><th class="picker__weekday" scope="col" title="vendredi">V</th><th class="picker__weekday" scope="col" title="samedi">S</th><th class="picker__weekday" scope="col" title="dimanche">D</th></tr></thead><tbody><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1493593200000" role="gridcell" aria-label="01/05/2017">1</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1493679600000" role="gridcell" aria-label="02/05/2017">2</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1493766000000" role="gridcell" aria-label="03/05/2017">3</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1493852400000" role="gridcell" aria-label="04/05/2017">4</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1493938800000" role="gridcell" aria-label="05/05/2017">5</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494025200000" role="gridcell" aria-label="06/05/2017">6</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494111600000" role="gridcell" aria-label="07/05/2017">7</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494198000000" role="gridcell" aria-label="08/05/2017">8</div></td><td role="presentation"><div class="picker__day picker__day--infocus picker__day--today picker__day--highlighted" data-pick="1494284400000" role="gridcell" aria-label="09/05/2017" aria-activedescendant="true">9</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494370800000" role="gridcell" aria-label="10/05/2017">10</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494457200000" role="gridcell" aria-label="11/05/2017">11</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494543600000" role="gridcell" aria-label="12/05/2017">12</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494630000000" role="gridcell" aria-label="13/05/2017">13</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494716400000" role="gridcell" aria-label="14/05/2017">14</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494802800000" role="gridcell" aria-label="15/05/2017">15</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494889200000" role="gridcell" aria-label="16/05/2017">16</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1494975600000" role="gridcell" aria-label="17/05/2017">17</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495062000000" role="gridcell" aria-label="18/05/2017">18</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495148400000" role="gridcell" aria-label="19/05/2017">19</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495234800000" role="gridcell" aria-label="20/05/2017">20</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495321200000" role="gridcell" aria-label="21/05/2017">21</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495407600000" role="gridcell" aria-label="22/05/2017">22</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495494000000" role="gridcell" aria-label="23/05/2017">23</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495580400000" role="gridcell" aria-label="24/05/2017">24</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495666800000" role="gridcell" aria-label="25/05/2017">25</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495753200000" role="gridcell" aria-label="26/05/2017">26</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495839600000" role="gridcell" aria-label="27/05/2017">27</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1495926000000" role="gridcell" aria-label="28/05/2017">28</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1496012400000" role="gridcell" aria-label="29/05/2017">29</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1496098800000" role="gridcell" aria-label="30/05/2017">30</div></td><td role="presentation"><div class="picker__day picker__day--infocus" data-pick="1496185200000" role="gridcell" aria-label="31/05/2017">31</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1496271600000" role="gridcell" aria-label="01/06/2017">1</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1496358000000" role="gridcell" aria-label="02/06/2017">2</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1496444400000" role="gridcell" aria-label="03/06/2017">3</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1496530800000" role="gridcell" aria-label="04/06/2017">4</div></td></tr><tr><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1496617200000" role="gridcell" aria-label="05/06/2017">5</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1496703600000" role="gridcell" aria-label="06/06/2017">6</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1496790000000" role="gridcell" aria-label="07/06/2017">7</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1496876400000" role="gridcell" aria-label="08/06/2017">8</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1496962800000" role="gridcell" aria-label="09/06/2017">9</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1497049200000" role="gridcell" aria-label="10/06/2017">10</div></td><td role="presentation"><div class="picker__day picker__day--outfocus" data-pick="1497135600000" role="gridcell" aria-label="11/06/2017">11</div></td></tr></tbody></table></div><div class="picker__footer"><button class="btn-flat picker__today" type="button" data-pick="1494284400000" disabled="" aria-controls="dateenfant">Aujourd'hui</button><button class="btn-flat picker__clear" type="button" data-clear="1" disabled="" aria-controls="dateenfant">RAZ</button><button class="btn-flat picker__close" type="button" data-close="true" disabled="" aria-controls="dateenfant">OK</button></div></div></div></div></div></div><input type="hidden" name="NAISSANCE_ENFANT">
        <label id="labelDateenfant" data-error="Champ obligatoire" for="dateenfant"></label>
    </div>
     
    <div class="input-field col s7">
        <span class="micons-user prefix"></span>
        <input id="prenomenfant" type="text" name="PRENOM_ENFANT" pattern=".{2,}" minlength="2" class="validate" required="required" aria-required="true">
        <label for="prenomenfant" data-error="invalide">Prénom</label>
    </div>
      <div class="input-field col s5">
                     <span class="fa fa-venus-mars prefix"></span>

    <div class="select-wrapper">
        <span class="caret">▼</span>
        <input type="text" class="select-dropdown" readonly="true" data-activates="select-options-1c8b69c2-d1f6-463a-7087-f84abfcae96d" value="Sexe" pattern=".{5,}">
        <ul id="select-options-1c8b69c2-d1f6-463a-7087-f84abfcae96d" class="dropdown-content select-dropdown ">
          <li class="disabled "><span>Sexe</span></li>
          <li class=""><span>Garçon</span></li>
          <li class=""><span>Fille</span></li>
        </ul>
        <select id="sexeenfant" name="SEXE_ENFANT" class="initialized">
        <option value="" disabled="" selected="">Sexe</option>
        <option value="G">Garçon</option>
        <option value="F">Fille</option>
      </select>
    </div>
  </div>
  <div class="col s12">

  </div>
</div>

      </div>
    </li>
  </ul>
  <div class="row" id="but" hidden="" style="display: block; display:none;">
 <div class="col s12">
<input type="checkbox" id="accept" onchange="accept_modal()">
<label for="accept" class="small">Je certifie que les informations ci-dessus sont correctes et suis informée qu’en vertu de la loi 09-08, je dispose d’un droit d’accès, de rectification et d’opposition au traitement de mes données personnelles. </label>
    </div>    
    
    <div class="col s4 offset-s6">
      <button type="submit" class="waves-effect waves-light btn lighten-1">ENVOYER</button>
    </div>
  </div>
          </form>


  </div>



 <div id="modal1" class="modal">
    <div class="modal-content">
      <h4>Important</h4>
      <p>Veuillez vous assurer que toutes les informations renseignées sont exactes.<br>Toute fausse information communiquée lors de votre inscription remettra en cause votre éligibilité au programme #Oumbox.</p>
    </div>
    <div class="modal-footer">
      <a class=" modal-action modal-close waves-effect waves-light btn lighten-1">Accepter</a >
    </div>
  </div>

  <div id="modal2" class="modal">
    <div class="modal-content">
      <h3>DERNIERE ETAPE POUR VALIDER VOTRE INSCRIPTION</h3>
      <p><br>
      Afin de compléter votre inscription, vous allez recevoir un email de vérification qui contient un lien afin de vérifier votre adresse email et sera suivi d'un second email contenant vos informations d'identification. 
      </p>
    </div>
    <div class="modal-footer">
      <a id="accept2" href="#" class=" modal-action modal-close waves-effect waves-light btn lighten-1">Continuer</a>
    </div>
  </div>

  
      <!--Import jQuery before materialize.js-->
      <script type="text/javascript" src="register/jquery.min.js"></script>
      <script type="text/javascript" src="register/materialize.min.js"></script>
      <script type="text/javascript" src="register/jquery.validate.min.js"></script>
      <script type="text/javascript" src="register/additional-methods.min.js"></script>
      <script type="text/javascript">
      
      $("#password").on("focusout", function (e) {
          if ($(this).val() != $("#passconf").val()) {
              $("#passconf").removeClass("valid").addClass("invalid");
              $("#labelPassconf").addClass("active");
          } else {
              $("#passconf").removeClass("invalid").addClass("valid");
          }
      });

      $("#passconf").on("keyup", function (e) {
          if ($("#password").val() != $(this).val()) {
              $(this).removeClass("valid").addClass("invalid");
          } else {
              $(this).removeClass("invalid").addClass("valid");
          }
      });
     $('.datepicker').pickadate({
    selectMonths: true, // Creates a dropdown to control month
    selectYears: 40, // Creates a dropdown of 15 years to control year
      formatSubmit: 'yyyy-mm-dd',
      format:'dd/mm/yyyy',
      closeOnSelect: true,
      firstDay:1,
      hiddenName:true,
      monthsFull: ['janvier', 'février', 'mars', 'avril', 'mai', 'juin', 'juillet', 'août', 'septembre', 'octobre', 'novembre', 'décembre'],
monthsShort: ['janv', 'févr', 'mars', 'avr', 'mai', 'juin', 'juil', 'août', 'sept', 'oct', 'nov', 'déc'],
weekdaysFull: ['dimanche', 'lundi', 'mardi', 'mercredi', 'jeudi', 'vendredi', 'samedi'],
weekdaysShort: ['dim', 'lun', 'mar', 'mer', 'jeu', 'ven', 'sam'],
weekdaysLetter: [ 'D', 'L', 'M', 'M', 'J', 'V', 'S' ],
//min:"01/01/1965",
//max:"31/12/2003",
        // Today and clear
        onClose: function() {
  },
        today: 'Aujourd\'hui',
        clear: 'RAZ',
        close: 'OK',
        labelMonthNext: 'Mois prochain',
        labelMonthPrev: 'Mois précédent',

        // The title label to use for the dropdown selectors
        labelMonthSelect: 'Choisir un mois',
        labelYearSelect: 'Choisir une année'

  });
function accept_modal(){
  if ($('#accept').is(':checked')){
    //display modal
    $('#modal1').modal('open');
  }
}
function update_child(){
  if($('#other').is(':checked')){
      $('#dateenfant').pickadate().pickadate('picker').set('min',-365*2);
       $('#dateenfant').pickadate().pickadate('picker').set('max',true);
          var d = new Date();
          d.setMonth(d.getMonth()-7);
      $('#dateenfant').pickadate().pickadate('picker').set('highlight',[d.getFullYear(),d.getMonth(),d.getDay()]);
   
          


    $('#lichild').show();
   updateMaterialSelect();
    $( "#headchild:not(.active)" ).trigger( "click" );
    $('html,body').animate({
                        scrollTop: $('#lichild').offset().top
                    }, 1000);
  }
  else{
        $('#dateenfant').val('');
        $('#prenomenfant').val('');
        $('#sexeenfant').val('');
        $('#lichild').hide();
  }
}
function updateMaterialSelect(){

          var keepInf = $("#sexeenfant").parent().find('input.invalid, input.valid').length;
          var keep = $("#sexe").parent().find('input.invalid, input.valid').length;

          $('select').material_select();
          $("input.select-dropdown").attr('pattern',".{5,}"); // add pattern for validation
          if (keepInf>0)
            $("#sexeenfant").parent().find('input').valid();
          if (keep>0)
            $("#sexe").parent().find('input').valid();
}

function update_baby(){
$("#but").show();
  if($('#mom1').is(':checked')){
        // Pregnant woman
       $('#accouchement').attr('placeholder', "Date prévue d'accouchement");
       // max to 9 month after today
       $('#accouchement').pickadate().pickadate('picker').set('min',-31); 
       $('#accouchement').pickadate().pickadate('picker').set('max',9*31);
   //    $('#accouchement').pickadate().pickadate('picker').set('highlight',5*31);
     var d = new Date();
          d.setMonth(d.getMonth()+4);
      $('#accouchement').pickadate().pickadate('picker').set('highlight',[d.getFullYear(),d.getMonth(),d.getDay()]);


// clean values
        $('#sexe').val('');
        $('#prenombebe').val('');
        $('#accouchement').val('');

       $('#divprenombebe').hide();
       $('#divsex').hide();

    $('#libaby').show();
    $( "#headbaby:not(.active)" ).trigger( "click" );
    $('html,body').animate({
                        scrollTop: $('#libaby').offset().top
                    }, 1000);
}
  else if ($('#mom2').is(':checked') ){
    // Baby is born
  $('#accouchement').attr('placeholder', "Date de naissance");
   // max to 2 years before today
      $('#accouchement').pickadate().pickadate('picker').set('min',-365*2);
       $('#accouchement').pickadate().pickadate('picker').set('max',15);
          var d = new Date();
          d.setMonth(d.getMonth()-4);
      $('#accouchement').pickadate().pickadate('picker').set('highlight',new Date(Date.UTC(d.getFullYear(),d.getMonth(),d.getDay())));     

  // clean values 
  $('#accouchement').val('');
     

      $('#divprenombebe').show();
       $('#divsex').show();
        $('#sexe').val('');
         updateMaterialSelect();

    $('#libaby').show();
    $( "#headbaby:not(.active)" ).trigger( "click" );
     $('html,body').animate({scrollTop: $('#libaby').offset().top}, 1000);
  } 
  else
     $('#libaby').hide();
}
$(document).ready(function() {
  $('.modal').modal();
 // $('.modal').modal({
 //      dismissible: true, // Modal can be dismissed by clicking outside of the modal
 //      opacity: .5, // Opacity of modal background
 //      inDuration: 300, // Transition in duration
 //      outDuration: 200, // Transition out duration
 //      startingTop: '4%', // Starting top style attribute
 //      endingTop: '10%' // Ending top style attribute
      
 //    }
 //  );

    $('select').material_select();
    $("input.select-dropdown").attr('pattern',".{5,}"); // add pattern for validation

  // adjust dynamically validation on selects
  $("#sexe").on('change', function() {
    $('#sexe').parent().find('input').valid();
});
  $("#sexeenfant").on('change', function() {
    $('#sexeenfant').parent().find('input').valid();
});
//$("select[required]").css({display: "block", visibility:'hidden', position: 'absolute'});

      var d = new Date();
      d.setFullYear(d.getFullYear()-16); // age min 

    $('#naissance').pickadate().pickadate('picker').set('max',[d.getFullYear(),d.getMonth(),d.getDay()]);
        $('#naissance').pickadate().pickadate('picker').set('min',[1965,0,1]);
        
          d.setFullYear(d.getFullYear()-14); // average age 30 years
      $('#naissance').pickadate().pickadate('picker').set('highlight',[d.getFullYear(),d.getMonth(),d.getDay()]);
      $('#naissance').pickadate('picker').on('render', function() {
            $("#myForm").validate().element('#naissance');
        });
       $('#dateenfant').pickadate('picker').on('render', function() {
            $("#myForm").validate().element('#dateenfant');
        });
        $('#accouchement').pickadate('picker').on('render', function() {
            $("#myForm").validate().element('#accouchement');
        });

    $.validator.setDefaults({
 errorClass: 'invalid',
 focusInvalid: false,
    invalidHandler: function(form, validator) {
//console.log('invalidHandler, nb:',validator.numberOfInvalids() );
         if ( $('#accouchement:not(.invalid)').is(':visible'))
           setTimeout(function () { $('#accouchement').valid()}, 500);
         if ( $('#dateenfant:not(.invalid)').is(':visible'))
           setTimeout(function () { $('#dateenfant').valid()}, 300);

           if ( $("#sexeenfant").parent().find('input:not(.invalid)').length>0)
            setTimeout(function () { $('#sexeenfant').parent().find('input').valid()}, 250);

        if (!validator.numberOfInvalids())
            return;

        $('html, body').animate({scrollTop: $(validator.errorList[0].element).offset().top}, 1000);

    },
  errorPlacement: function(error, element) {
          element.next("label").attr("data-error", error.contents().text());
        },
  messages:{
    required:"Champ obligatoire"
  }

});
$("#myForm").submit(function(e) {
    e.preventDefault();
    $("#labelEmail").addClass('active');
    $("#labelPassconf").addClass('active');
    $("#labelPassword").addClass('active');
    $("#labelPrenom").addClass('active');
    $("#labelNom").addClass('active');
    $("#labelGsm").addClass('active');
    $("#labelAdresse").addClass('active');
    $("#labelZip").addClass('active');

    $("label[for='naissance']").addClass('active');
    $("label[for='naissance']").css('bottom','27px');
    
    if($('#ville').val()==null || $('#ville').val()==0){
       $(".selectCity > span:nth-child(3)").css('display','unset');
    }else{
     $(".selectCity > span:nth-child(3)").css('display','none');
    }

    $("#accouchement").addClass('invalid');
    $("#dateenfant").addClass('invalid');

    $("#labelMat").addClass('active');

    $("label[for='accouchement']").addClass('active');
    $("label[for='labelDateenfant']").addClass('active');

    if($("#prenombebe").val()==''){
      $("#prenombebe").addClass('invalid');
    }
    $("label[for='prenombebe']").addClass('active');

    if($('#sexe').val()==null)
      $("#divsex > div > span:nth-child(5)").css('display','unset');
    else
     $("#divsex > div > span:nth-child(5)").css('display','none');
    $('#sexe').on('change', function () {
        $("#divsex > div > span:nth-child(5)").css('display', 'none');
    })

    /*$("label[for='mat']").addClass('active');
    $("label[for='gyn']").addClass('active');*/
    

  }).validate({
    rules:{
  //  SEXE_ENFANT : { min: 1 }
    },
        messages: {
            EMAIL:{
                pattern: "Veuillez entrer un email valide"},
            GSM:{
              pattern: "Veuillez entrer un numéro valide"
        },
        CP:{
            pattern: "Veuillez entrer un nombre valide"

        },
        NAISSANCE_BEBE:{
            required: "Veuillez entrer une date valide"
        }
       },
       submitHandler: function (form) {
      //  console.log('form ok');

        if(checkForm() && $('#ville option:selected').text()!=="Ville"){
        console.log("form valide");
        console.log($('#ville option:selected').text());
        console.log($("#myForm").serialize());
        $.ajax(
        { type:"POST",
          url:"tools/sendform.php", //replace with full url
          data:$("#myForm").serialize(),
          error:function(data){
          console.log(data);
          Materialize.toast("Une erreur est survenue.",4000)},
          statusCode: {
            400: function() {
            Materialize.toast("Les données sont invalides. Veuillez svp les vérifier et renouveler l'envoi.",4000);
            },
            404: function() {
           Materialize.toast("Données incorrectes.",4000);
            },
            503: function() {
           Materialize.toast("Problème de connexion avec le serveur. Veuillez svp réessayer ultérieurement.",4000);
            },
            204: function() {
            Materialize.toast("Votre demande n'a pu être envoyée avec succès. Veuillez svp vérifier les données et renouveler l'envoi.",4000);
            },
            202: function(data) {
            console.log('error 202');
            Materialize.toast("Votre demande a été envoyée avec succès. Veuillez svp vérifier ",4000);

             $('#modal2').modal('open'); 
             $('#accept2').click(function(){
              document.location.href="login.php";
             });
           
           /* $("#content").hide();
            $("#incent").hide();
            $("#status").html('Bienvenue!<br>Votre inscription a été effectuée avec succès.').show();*/
            },
            200: function() {
             $('#modal2').modal('open'); 
             $('#accept2').click(function(){
              document.location.href="login.php";
             });

            /*$("#content").hide();
            $("#incent").hide();*/
            //$("#status").html('Bienvenue!<br>Votre inscription a été effectuée avec succès.').show();
            /*$("#status").html('Votre inscription a été effectuée avec succès.<br><br>Nous vous conseillons de rajouter contact@oumbox.com à votre liste de contact pour être sûre de recevoir nos futures communications.').show();*/
            }
          }
        });
        }else{
          console.log("invalid form");
        }
             
    }
     });
$.extend($.validator.messages, {
    required: "Champ obligatoire",
    email: "Veuillez entrer un email valide",
    date: "Veuillez entrer une date",
    number: "Veuillez entrer un nombre",
    digits: "Veuillez entrer des chiffres seulement",
    equalTo: "Entrez à nouveau la même valeur",
    maxlength: jQuery.validator.format("Pas plus de {0} caractères"),
    minlength: jQuery.validator.format("Au moins {0} caractères"),
    rangelength: jQuery.validator.format("Entrez une chaîne de {0} à {1} caractères"),
    range: jQuery.validator.format("La valeur doit être comprise entre {0} et {1}"),
    max: jQuery.validator.format("La valeur ne doit pas dépasser {0}"),
    min: jQuery.validator.format("La valeur doit être supérieure ou égale à {0}")
});
$.validator.addMethod("valueNotEquals", function(value, element, arg){
  return arg != value;
 }, "Veuillez faire une sélection");

// add label at the good place to display validation error
$("input.datepicker").each(function(i,elem)
{
 $(elem).after('<label for="' + $(elem).attr("id") + '"></label>');
});

});

function checkForm(){
  // validate accouchement
  result=false;

 
  if ($('#myForm').validate().element('#accouchement') &&
     ( !$('#other').is(':checked') || ($('#other').is(':checked') && $('#myForm').validate().element('#dateenfant')) ) ){
    result = true;
  }
  if ($('#other').is(':checked') && $("#sexeenfant").val() == null){
    //set invalid sexe enfant select
    $("#sexeenfant").parent().find('input').valid();
    result = false;
  } 
  // ensure the user accepted the conditions
    /*if (!($('#mom1').is(':checked') || $('#mom1').is(':checked'))){
        $(".continueBtn").trigger("click");

        $("li.active.maman").hasClass("hidden")
        result = false;
    }*/
    else if (!$('#accept').is(':checked')){
    result=false;
    Materialize.toast("Veuillez accepter les conditions pour vous inscrire.",4000);

  }




 //   console.log("checkform : "+result);
    return result;
}


function scroller() {
            if (location.pathname.replace(/^\//, '') == this.pathname.replace(/^\//, '') || location.hostname == this.hostname) {

                var target = $(this.hash);
                target = target.length ? target : $('[name=' + this.hash.slice(1) + ']');
                if (target.length) {
                    $('html,body').animate({
                        scrollTop: target.offset().top
                    }, 1000);
                    return false;
                }
            }
}
$(function() {
        $('a[href*=#]:not([href=#])').click(scroller);
    });
</script>
   
<script type="text/javascript">
  
  $('.continueBtn').click(function() {
    //$("li.active.maman").removeAttr( "hidden" );
    
    var a = $("#email").val()=="";
    var b = $("#password").val()=="";
    if($("#email").val()==""){
      $("#labelEmail").addClass('active');
      $("#email").addClass('invalid');  
    }
    if($("#password").val()==""){
      $("#labelPassword").addClass('active');
      $("#labelPassconf").addClass('active');
      $("#password").addClass('invalid');  
    }
      if ($("#password").val() != $("#passconf").val()) {
          $("#passconf").removeClass("valid").addClass("invalid");
           $("#labelPassconf").addClass("active");
      } else {
          $("#passconf").removeClass("invalid").addClass("valid");
      }

    $

    if(!a && !b && $("#email").hasClass('valid') && $("#password").hasClass('valid') && $("#passconf").hasClass('valid')){
      var myData = {email:$("#email").val(),methode:'isUserAlreadyExist'};
      $.ajax({
        url:'gestion/lib/util.php',
        type:'POST',
        data:myData,
        dataType: "json",
        success:function(data){
          if(data['isUserAlreadyExist']==true){
              Materialize.toast("Email déjà existant",4000);
          }else{
              $("li.active.maman").removeAttr( "hidden" );
              $("#libaby0").attr( "hidden",'' );
              $("#but").css("display","unset");
          }
        },
        error:function(data){
          console.log(data);
            //Materialize.toast("Problème de connexion avec le serveur. Veuillez svp réessayer ultérieurement.",4000);
        }
      });
    }
    
   /* else{
       $("li.active.maman").removeAttr( "hidden" );
      $("#libaby0").attr( "hidden",'' );
    }*/
   /* $("#labelPassconf").addClass('active');
    $("#labelPassword").addClass('active');*/
    //$("#libaby0").attr( "hidden",'' );
  }); 

</script>

        <script>
  // Load the SDK asynchronously
  (function(thisdocument, scriptelement, id) {
    var js, fjs = thisdocument.getElementsByTagName(scriptelement)[0];
    if (thisdocument.getElementById(id)) return;
    
    js = thisdocument.createElement(scriptelement); js.id = id;
    js.src = "//connect.facebook.net/en_US/sdk.js"; //you can use 
    fjs.parentNode.insertBefore(js, fjs);
  }(document, 'script', 'facebook-jssdk'));
    
  window.fbAsyncInit = function() {
  FB.init({
    appId      : '143410559536671', //Your APP ID
    cookie     : true,  // enable cookies to allow the server to access 
                        // the session
    xfbml      : true,  // parse social plugins on this page
    version    : 'v2.1' // use version 2.1
  });

  // These three cases are handled in the callback function.
  FB.getLoginStatus(function(response) {
    statusChangeCallback(response);
  });

  };
    
  // This is called with the results from from FB.getLoginStatus().
  function statusChangeCallback(response) {
    if (response.status === 'connected') {
      // Logged into your app and Facebook.
      /*_i();*/
    } else if (response.status === 'not_authorized') {
      // The person is logged into Facebook, but not your app.
      document.getElementById('status').innerHTML = 'Please log ' +
        'into this app.';
    }
  }  
  
  $("button.signupFB").click(function() {
    
     function _login() {
       FB.login(function(response) {
          // handle the response
          console.log(response);
          if(response.status==='connected') {
           _i();
          }
        }, {scope: 'public_profile,email'});
    }
    _login();
    
  });
  
 
 function _i(){
     var url = '/me?fields=gender,first_name,last_name,email';
     FB.api(url, function(response) {
        console.log(response);
        $("li.active.maman").removeAttr( "hidden" );
        $("#libaby0").attr( "hidden",'' );

        $("#prenom").val(response.first_name);
        $("#nom").val(response.last_name);

        $("#email").val("default@gmail.com");
        $("#password").val("default");
        $("#passconf").val("default");

       /* $(".part1").hide();*/

         $("#myForm > ul > li.active.maman > div.collapsible-body > div > div:nth-child(1) > label").addClass("active");
         $("#myForm > ul > li.active.maman > div.collapsible-body > div > div:nth-child(2) > label").addClass("active");
    });
 }

</script>

<div class="hiddendiv common"></div><input type="hidden" value="mata-inactive-38.png" id="mata-icon-name"><div class="ha"></div>
