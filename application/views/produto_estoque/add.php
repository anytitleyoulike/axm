
<?php echo form_open('produto_estoque/add',array("class"=>"form-horizontal")); ?>

	<div class="form-group">
		<label for="data_criacao" class="col-md-4 control-label">Data Criacao</label>
		<div class="col-md-8">
			<input type="text" name="data_criacao" value="<?php echo $this->input->post('data_criacao'); ?>" class="form-control" id="data_criacao" />
		</div>
	</div>
	<div class="form-group">
		<label for="quantidade" class="col-md-4 control-label">Quantidade</label>
		<div class="col-md-8">
			<input type="text" name="quantidade" value="<?php echo $this->input->post('quantidade'); ?>" class="form-control" id="quantidade" />
		</div>
	</div>
	<div class="form-group">
		<label for="quantidade_baixa" class="col-md-4 control-label">Quantidade Baixa</label>
		<div class="col-md-8">
			<input type="text" name="quantidade_baixa" value="<?php echo $this->input->post('quantidade_baixa'); ?>" class="form-control" id="quantidade_baixa" />
		</div>
	</div>
	<div class="form-group">
		<label for="produto_id" class="col-md-4 control-label">Produto Id</label>
		<div class="col-md-8">
			<select name="produto_id" class="form-control">
				<option value="">select produto</option>
				<?php 
				foreach($produto as $produto)
				{
					echo '<option value="'.$produto['id'].'">'.$produto['id']."</option>";
				} 
				?>
			</select>
		</div>
	</div>
	
	<div class="form-group">
		<div class="col-sm-offset-4 col-sm-8">
			<button type="submit" class="btn btn-success">Save</button>
        </div>
	</div>

<?php echo form_close(); ?>