<?php 

if (isset($_SESSION["Operateur"])) {

ob_start(); 
$Operateurr = "Operateur";  ?>




	<div class="hero">
		<div class="container">
			<div class="row align-items-center">
				<div class="col-lg-7">
					<div class="intro-wrap">
						<h1 class="mb-5"><span class="d-block">Let's Enjoy Your</span> Travel In <span class="typed-words"></span></h1>

			
					</div>
				</div>
	
			</div>
		</div>
	</div>

  <div class="container ">
  

  <div class=" text-center ">
        <div class="row">
        <div class="col-sm-12 bg-black p-4 " >

         
         <!-- <a class="mb-5 chose "  href="index.php?action=CreateCompany">Ajouter Company</a> -->
       
        
         <a class="mb-5 chose "  href="index.php?action=affichBus" >Ajouter Bus</a>


         <!-- <a class="mb-5 chose"  href="index.php?action=route" >Ajouter Un Route</a> -->


         <!-- <a class="mb-5 chose "  href="index.php?action=Operateur" >Ajouter Opérateur</a> -->

         

         <a class="mb-5 chose active"  href="index.php?action=Horaire" >Ajouter Un Horaire</a>

       
     
            <div class="row">
            <div class="col-12 col-sm-12  p-5 text-light text-center table-responsive">
            <label for="" class="form-label mb-4 ">Liste des Horaire : </label>
            <table class="table table-striped table-hover " >
                <thead >
                    <tr>
                    <th  scope="col">id</th>
                    <th  scope="col">email_client</th>
                    <th  scope="col">horaire</th>
                    <th  scope="col">seat number</th>
                    <th  scope="col">Opérations</th>
                    </tr>
                </thead>
           
                <tbody class="table-group-divider">
            

                <?php foreach ($reservations as $reservation) { ?>
    <tr>
        <td><?= $reservation->getID() ?></td>
        <td><?= $reservation->getClientEmail() ?></td>
        <td><?= $reservation->getHoraire()["Date"] ?></td>
        <td><?= $reservation->getHoraire()["Heure_depart"] ?></td>
        <td><?= $reservation->getBus()["busNumber"] ?></td>
        <td><?= $reservation->getNumberSeat() ?></td>
                  
                   
        <a class="btn btn-danger mb-2 ms-2 delete-btn" data-bs-id="<?= $reservation->getID() ?>" data-bs-name="this reservation" href="#">delete</a>

                    </td>
                    </tr>
               
              <?php } ?>
              
                </tbody> 
                </table>
                <div id="rebons"></div>
            
            
            </div>
          </div>
          </div>
        </div>

</div>
	
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog ">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">delete</h1>
      </div>
      <div class="modal-body">
        
       
      </div>
      <div class="modal-footer">

        
      </div>
    </div>
  </div>
</div>


	
<script>
    // JavaScript to handle modal trigger click event and set the modal target dynamically
    const modalTriggers = document.querySelectorAll('.modal-trigger');
    modalTriggers.forEach((trigger) => {
        trigger.addEventListener('click', (event) => {
            event.preventDefault();
            const id = trigger.getAttribute('data-bs-id');
            const nom = trigger.getAttribute('data-bs-name');
            const modal = document.getElementById('exampleModal');
            const body = modal.querySelector('.modal-body');
            const modalTrigger = modal.querySelector('.modal-footer');
            // Use the fetched 'id' to perform further actions or data retrieval
            modalTrigger.innerHTML = `<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            
            <a class="btn btn-success mb-2 ms-2" href="index.php?action=destroHoraire&id=${id}">delete</a>
`;
            body.innerHTML = `Do you want to delete : ${nom}`;
            // Set the 'data-bs-target' attribute of the modal dynamically
            modal.setAttribute('data-bs-target', `#exampleModal?id=${id}`);
            // Show the modal
            const myModal = new bootstrap.Modal(modal);
            myModal.show();
        });
    });

</script>

    <?php $contant =  ob_get_clean();
    include_once "View\layout.php" ; 
    
  }
    ?>
