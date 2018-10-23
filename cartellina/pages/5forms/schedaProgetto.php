<!-- Modal -->
<div class="modal fade" id="inserisciprogetto" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Crea Nuovo Progetto </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
	  
	  
	  
	  
	  
	  
	  
	  <form action="regioneprogettoinsert.php" method="post" >
  <div class="form-group">
    <label for="exampleFormControlInput1">Ente (menu tendina compaiono tutti gli enti presenti nel database.. foreach.... per ultimo) </label>
    <input type="text" class="form-control" id="selezionaente" name="ente" placeholder="">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Titolo</label>
    <input type="text" class="form-control" id="titoloente" name="titolo" placeholder="">
  </div>
  
    <div class="form-group">
    <label for="exampleFormControlInput1">Anno Bando</label>
    <input type="text" class="form-control" id="id_annobando" name="bando" placeholder="">
  </div>
  
  <div class="form-group">
    <label for="exampleFormControlSelect1">Settore Prevalente </label>
    <select class="form-control" id="id_enteprevalente" name="prevalente">
      <option>-  Assistenza e servizio sociale</option>
      <option>- Valorizzazione del patrimonio storico, artistico e ambientale</option>
      <option>- Promozione ed organizzazione di attività educative e culturali</option>
      <option>- Promozione ed organizzazione di attività dell’economia solidale</option>
      <option>- Promozione ed organizzazione di attività di protezione civile</option>
      
     
      
    </select>
  </div>

  
    <div class="form-group">
    <label for="exampleFormControlInput1">Altro Settore</label>
    <input type="text" class="form-control" id="id_altrosettore" name="altro" placeholder="">
  </div>
  
    <div class="form-group">
    <label for="exampleFormControlInput1">Sede Attuazione  </label>
    <select class="form-control" id="id_sedeattuazione" name="attuazione">
      <option> Assistenza e servizio sociale</option>
      <option>- Valorizzazione del patrimonio storico, artistico e ambientale</option>
      <option>- Promozione ed organizzazione di attività educative e culturali</option>
      <option>- Promozione ed organizzazione di attività dell’economia solidale</option>
      <option>- Promozione ed organizzazione di attività di protezione civile</option>
      
     
      
    </select>
  </div>
  
  
  <div class="form-group">
    <label for="exampleFormControlInput1">Numero Volontari</label>
    <input type="text" class="form-control" id="id_altrosettore" name="nv" placeholder="">
  </div>
  
      <div class="form-group">
    <label for="exampleFormControlInput1">Stato  </label>
    <select class="form-control" id="id_sedeattuazione" name="stato">
      <option>Attivo</option>
      <option>Concluso</option>
      <option>Ritirato</option>
     
      
      
     
      
    </select>
  </div>
  
  <button type="submit" class="btn btn-info" >SALVA</button>
  <button type="button" class="btn btn-success" >SALVA E CONFERMA</button>
        
        <button type="button" class="btn btn-danger" data-dismiss="modal">CHIUDI</button>      <!-- data dismiss ricordite -->
  
  
  
  
  
</form>
	  
	  
	  
	  
</div>
   
	  
	  
	
	  
    </div>
  </div>
</div>