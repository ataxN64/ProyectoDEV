<style>
	.img-thumb-path {
		width: 100px;
		height: 80px;
		object-fit: scale-down;
		object-position: center center;
	}
</style>
<div class="card card-outline card-primary rounded-0 shadow">
	<div class="card-header">
		<h3 class="card-title">Lista de Aulas / Salon </h3>
		<?php if ($_settings->userdata('type') == 1) : ?>
			<div class="card-tools">
				<a href="javascript:void(0)" id="create_new" class="btn btn-flat btn-sm btn-primary"><span class="fas fa-plus"></span> Agregar salon o Aula</a>
			</div>
		<?php endif; ?>
	</div>
	<div class="card-body">
		<div class="container-fluid">
			<div class="container-fluid">
				<table class="table table-bordered table-hover table-striped">
					<colgroup>
						<col width="5%">
						<col width="15%">
						<col width="25%">
						<col width="25%">
						<col width="15%">
						<col width="15%">
					</colgroup>
					<thead>
						<tr class="bg-gradient-dark text-light">
							<th>#</th>
							<th>Fecha Creación</th>
							<th>Nombre</th>
							<th>Descrición</th>
							<th>Estado</th>
							<th>Acción</th>
						</tr>
					</thead>
					<tbody>
						<?php
						$i = 1;
						$qry = $conn->query("SELECT * from `department_list` where delete_flag = 0 order by `name` asc ");
						while ($row = $qry->fetch_assoc()) :
						?>
							<tr>
								<td class="text-center"><?php echo $i++; ?></td>
								<td class=""><?php echo date("Y-m-d H:i", strtotime($row['date_created'])) ?></td>
								<td class="">
									<p class="m-0 truncate-1"><?php echo $row['name'] ?></p>
								</td>
								<td class="">
									<p class="m-0 truncate-1"><?php echo $row['description'] ?></p>
								</td>
								<td class="text-center">
									<?php
									switch ($row['status']) {
										case 1:
											echo '<span class="rounded-pill badge badge-success bg-gradient-teal px-3">Activo</span>';
											break;
										case 0:
											echo '<span class="rounded-pill badge badge-danger bg-gradient-danger px-3">Inactivo</span>';
											break;
									}
									?>
								</td>
								<td align="center">
									<button type="button" class="btn btn-flat btn-default btn-sm dropdown-toggle dropdown-icon" data-toggle="dropdown">
										Acción
										<span class="sr-only">Toggle Dropdown</span>
									</button>
									<div class="dropdown-menu" role="menu">
										<a class="dropdown-item view_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-eye text-dark"></span> Ver</a>
										<?php if ($_settings->userdata('type') == 1) : ?>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item edit_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-edit text-primary"></span> Editar</a>
											<div class="dropdown-divider"></div>
											<a class="dropdown-item delete_data" href="javascript:void(0)" data-id="<?php echo $row['id'] ?>"><span class="fa fa-trash text-danger"></span> Eliminar</a>
										<?php endif; ?>
									</div>
								</td>
							</tr>
						<?php endwhile; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<script>
	$(document).ready(function() {
		$('#create_new').click(function() {
			uni_modal("Agregar Aula / Salon", "departments/manage_department.php")
		})
		$('.view_data').click(function() {
			uni_modal("Aula / Salon", "departments/view_department.php?id=" + $(this).attr('data-id'))
		})
		$('.edit_data').click(function() {
			uni_modal("Actualizar Información Aula / Salon", "departments/manage_department.php?id=" + $(this).attr('data-id'))
		})
		$('.delete_data').click(function() {
			_conf("Deseas borrar deparamento permanentemente?", "delete_department", [$(this).attr('data-id')])
		})
		$('.table td, .table th').addClass('py-1 px-2 align-middle')
		$('.table').dataTable({
			columnDefs: [{
				orderable: false,
				targets: 5
			}],
		});
	})

	function delete_department($id) {
		start_loader();
		$.ajax({
			url: _base_url_ + "classes/Master.php?f=delete_department",
			method: "POST",
			data: {
				id: $id
			},
			dataType: "json",
			error: err => {
				console.log(err)
				alert_toast("Ocurrió un error.", 'error');
				end_loader();
			},
			success: function(resp) {
				if (typeof resp == 'object' && resp.status == 'success') {
					location.reload();
				} else {
					alert_toast("Ocurrió un error.", 'error');
					end_loader();
				}
			}
		})
	}
</script>