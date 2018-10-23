<!-- Modal -->
<div class="modal fade" id="inseriscivolontario" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Inserisci Volontario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  
	  
	  
	  
	  
	  
	  <form action="entevolontarioinsert.php" method="post" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Nome</label>
    <input type="text" class="form-control" id="nomevol" name="nomevol" placeholder="Nome ">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput2">Cognome</label>
    <input type="text" class="form-control" id="codfis" name="cognomevol" placeholder="Cognome">
  </div>
  <div class="form-group">
    <label for="exampleFormControlInput2">Codice Fiscale</label>
    <input type="text" class="form-control" id="codfis" name="codfisvol" placeholder="Codice Fiscale">
  </div>
  <div class="form-group">
    <label for="exampleFormControlSelect3">Sesso</label>
    <select class="form-control" id="entetipo" name="sessovol">
      <option>seleziona</option>
      <option>M</option>
      <option>F</option>
      
     
      
    </select>
  </div>
  
<div class="form-group">
    <label for="exampleFormControlInput1">Provincia/Nazione di Nascita</label>
    <input type="text" class="form-control" id="rapleg" name="pnn" placeholder="">
  </div>
  
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Estero</label>
    <input type="text" class="form-control" id="telefono"  name="estero" placeholder="">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Comune/Nazione di Nascita</label>
    <input type="text" class="form-control" id="entefax" name="cnn" placeholder="Fax">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Indirizzo di Residenza</label>
    <input type="text" class="form-control" id="entehttp" name="indres" placeholder="HTTP">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Numero Civico</label>
    <input type="text" class="form-control" id="entemail" name="nc" placeholder="E-Mail">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Cap</label>
    <input type="text" class="form-control" id="entepec"  name="Cap" placeholder="Nome dell' Ente">
  </div>
  

  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Provincia Domicilio</label>
    <select class="form-control" id="enteprovincia" name="provdom">
      <option>Venezia</option>
      <option>Padova</option>
      <option>Verona</option>
      <option>Vicenza</option>
      <option>Treviso</option>
      <option>Belluno</option>
      <option>Rovigo</option>
      

     
      
    </select>
  </div>
  
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Comune Domicilio</label>
    <select class="form-control" id="enteprovincia" name="comdom">
      <option>Venezia</option>
      <option>Padova</option>
      <option>Verona</option>
      <option>Vicenza</option>
      <option>Treviso</option>
      <option>Belluno</option>
      <option>Rovigo</option>
      

     
      
    </select>
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Indirizzo Domicilio</label>
    <input type="text" class="form-control" id="enteindirizzo" name="inddomi"placeholder="Indirizzo">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Numero Civico</label>
    <input type="text" class="form-control" id="entenumerocivico" name="numcivdom"placeholder="Numero Civico">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">C.A.P. Domicilio</label>
    <input type="text" class="form-control" id="entecap" name="capdom" placeholder="C.A.P.">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Titolo di Studio</label>
    <select class="form-control" id="enteprovincia" name="titstud">
      <option>Venezia</option>
      <option>Padova</option>
      <option>Verona</option>
      <option>Vicenza</option>
      <option>Treviso</option>
      <option>Belluno</option>
      <option>Rovigo</option>
      

     
      
    </select>
  </div>
  
  
    <div class="form-group">
    <label for="exampleFormControlSelect1">Stato</label>
    <select class="form-control" id="enteprovincia" name="suostato">
      <option>Venezia</option>
      <option>Padova</option>
      <option>Verona</option>
      <option>Vicenza</option>
      <option>Treviso</option>
      <option>Belluno</option>
      <option>Rovigo</option>
      

     
      
    </select>
  </div>
  
  
  
  <div class="form-group">
    <label for="exampleFormControlInput1">nome OLP</label>
    <input type="text" class="form-control" id="enteindirizzo" name="nolp" placeholder="Indirizzo">
  </div>
  
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Cognome OLP</label>
    <input type="text" class="form-control" id="enteindirizzo" name="colp"placeholder="Indirizzo">
  </div>
  
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Codice IBAN</label>
    <input type="text" class="form-control" id="enteindirizzo" name="iban"placeholder="Indirizzo">
  </div>
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  
  <button type="submit" class="btn btn-info" >SALVA</button>
   <button type="button" class="btn btn-success" >SALVA E CONFERMA</button>
           <button type="button" class="btn btn-danger" data-dismiss="modal">CHIUDI</button>      <!-- data dismiss ricordite -->

</form>
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
	  
  
      </div>
     

    </div>
  </div>
</div>