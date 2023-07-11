<body>
    <div class="container">
        <form action="./../controller/heroi.ctrl.php" method="post" enctype="multipart/form-data">
            <input type="hidden" name="act" value="cad">
            <div class="form-group">
                <label for="nome">Nome do Herói:</label>
                <input type="text" name="nome" class="form-control" id="nome" placeholder="Nome do Herói" required min="3" max="50">
            </div>

            <div class="form-group">
                <label for="desc">Descrição:</label>
                <textarea name="desc" class="form-control" id="desc" rows="5" placeholder="Descrição" required min="3" max="1000"></textarea>
            </div>

            <div class="form-group">
                <label for="imagem">Imagem:</label>
                <input type="file" name="imagem" accept="image/*" class="form-control-file" id="imagem" required>
            </div>

            <input type="submit" value="Salvar" class="btn btn-primary">
        </form>
    </div>
</body> 

