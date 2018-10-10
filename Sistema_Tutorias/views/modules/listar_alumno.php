<h1>LISTA DE ALUMNOS</h1>

<div class="col-sm-12">
          <table>
              <thead>
              <tr>
                  <th>Fotografía</th>
                  <th>Nombre</th>
                  <th>Matricula</th>
                  <th>Carrera</th>
                  <th>Situación acamdémica</th>
                  <th>Email</th>
                  <th>Tutor</th>
                  <th></th>
                  <th></th>
              </tr>
              </thead>
              <tbody>
                <?php
                  $mostrar= new MvcController();
	                //Se manda a llamar los controladores de listarAlumnosController y eliminarAlumnosController.
	                $mostrar->listarAlumnosController();
                  $mostrar->eliminarAlumnosController();
                ?>
              </tbody>
          </table>

    </div>
