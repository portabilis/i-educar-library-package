<?php

namespace iEducar\Packages\Library\Commands;

use App\Menu;
use Illuminate\Console\Command;

class LibraryInstallCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'library:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install Library package';

    public function handle()
    {
        $this->installMenus();
    }

    private function installMenus(): void
    {
        $menus = $this->getMenusForInsert();

        foreach ($menus as $menu) {
            Menu::query()->updateOrCreate($menu);
        }
    }

    private function getMenusForInsert(): array
    {
        return [
            ['parent_id' => NULL,'title' => 'Biblioteca','description' => NULL,'link' => '/intranet/educar_biblioteca_index.php','icon' => 'fa-book','order' => 8,'type' => 1,'parent_old' => 57,'old' => 57,'process' => NULL,'active' => true],
            ['parent_id' => 21,'title' => 'Bibliotecas','description' => 'Bibliotecas','link' => '/intranet/educar_biblioteca_lst.php','icon' => NULL,'order' => 2,'type' => 3,'parent_old' => 591,'old' => 15880,'process' => 15858,'active' => true],
            ['parent_id' => 21, 'title' => 'Configurações', 'description' => 'Configurações de bibliotecas','link' =>  '/intranet/educar_biblioteca_dados_lst.php', 'icon' => NULL, 'order' => 2,'type' => 3,'parent_old' => 629,'old' => 15890,'process' => 15858, 'active' => true],
            ['parent_id' => 21, 'title' => 'Obras', 'description' => 'Obras','link' =>  '/intranet/educar_acervo_lst.php', 'icon' => NULL, 'order' => 3,'type' => 3,'parent_old' => 598,'old' => 15878,'process' => 15858, 'active' => true],
            ['parent_id' => 21, 'title' => 'Exemplares', 'description' => 'Exemplares','link' =>  '/intranet/educar_exemplar_lst.php', 'icon' => NULL, 'order' => 4,'type' => 3,'parent_old' => 606,'old' => 15879,'process' => 15858, 'active' => true],
            ['parent_id' => 21, 'title' => 'Clientes', 'description' => 'Clientes','link' =>  '/intranet/educar_cliente_lst.php', 'icon' => NULL, 'order' => 5,'type' => 3,'parent_old' => 603,'old' => 15892,'process' => 15858, 'active' => true],
            ['parent_id' => 22, 'title' => 'Reservas', 'description' => 'Reservas de exemplares','link' =>  '/intranet/educar_reservas_lst.php', 'icon' => NULL, 'order' => 1,'type' => 3,'parent_old' => 609,'old' => 15869,'process' => 15859, 'active' => true],
            ['parent_id' => 22, 'title' => 'Empréstimos', 'description' => 'Empréstimos de exemplares','link' =>  '/module/Biblioteca/emprestimo', 'icon' => NULL, 'order' => 2,'type' => 3,'parent_old' => 610,'old' => 15894,'process' => 15859, 'active' => true],
            ['parent_id' => 22, 'title' => 'Devoluções', 'description' => 'Devoluções de exemplares','link' =>  '/intranet/educar_exemplar_devolucao_lst.php', 'icon' => NULL, 'order' => 3,'type' => 3,'parent_old' => 628,'old' => 15895,'process' => 15859, 'active' => true],
            ['parent_id' => 22, 'title' => 'Dívidas', 'description' => 'Dívidas de exemplares','link' =>  '/intranet/educar_pagamento_multa_lst.php', 'icon' => NULL, 'order' => 4,'type' => 3,'parent_old' => 622,'old' => 15893,'process' => 15859, 'active' => true],
            ['parent_id' => 34, 'title' => 'Obras', 'description' => 'Autores de obras','link' =>  NULL, 'icon' => NULL, 'order' => 1,'type' => 4,'parent_old' => NULL,'old' => 999901,'process' => 999900, 'active' => true],
            ['parent_id' => 34, 'title' => 'Exemplares', 'description' => 'Autores de obras','link' =>  NULL, 'icon' => NULL, 'order' => 3,'type' => 4,'parent_old' => NULL,'old' => 999903,'process' => 999900, 'active' => true],
            ['parent_id' => 34, 'title' => 'Clientes', 'description' => 'Autores de obras','link' =>  NULL, 'icon' => NULL, 'order' => 4,'type' => 4,'parent_old' => NULL,'old' => 999904,'process' => 999900, 'active' => true],
            ['parent_id' => 101, 'title' => 'Assuntos', 'description' => 'Assuntos de obras','link' =>  '/intranet/educar_acervo_assunto_lst.php', 'icon' => NULL, 'order' => 0,'type' => 5,'parent_old' => 592,'old' => 15877,'process' => 999901, 'active' => true],
            ['parent_id' => 101, 'title' => 'Autores', 'description' => 'Autores de obras','link' =>  '/intranet/educar_acervo_autor_lst.php', 'icon' => NULL, 'order' => 0,'type' => 5,'parent_old' => 594,'old' => 15881,'process' => 999901, 'active' => true],
            ['parent_id' => 101, 'title' => 'Categorias', 'description' => 'Categorias de obras','link' =>  '/intranet/educar_categoria_lst.php', 'icon' => NULL, 'order' => 0,'type' => 5,'parent_old' => 599,'old' => 999866,'process' => 999901, 'active' => true],
            ['parent_id' => 101, 'title' => 'Coleções', 'description' => 'Coleções de obras','link' =>  '/intranet/educar_acervo_colecao_lst.php', 'icon' => NULL, 'order' => 0,'type' => 5,'parent_old' => 593,'old' => 15882,'process' => 999901, 'active' => true],
            ['parent_id' => 101, 'title' => 'Editoras', 'description' => 'Editoras de obras','link' =>  '/intranet/educar_acervo_editora_lst.php', 'icon' => NULL, 'order' => 0,'type' => 5,'parent_old' => 595,'old' => 15883,'process' => 999901, 'active' => true],
            ['parent_id' => 101, 'title' => 'Fontes', 'description' => 'Fontes de obras','link' =>  '/intranet/educar_fonte_lst.php', 'icon' => NULL, 'order' => 0,'type' => 5,'parent_old' => 608,'old' => 15889,'process' => 999901, 'active' => true],
            ['parent_id' => 101, 'title' => 'Idiomas', 'description' => 'Idiomas de obras','link' =>  '/intranet/educar_acervo_idioma_lst.php', 'icon' => NULL, 'order' => 0,'type' => 5,'parent_old' => 590,'old' => 15884,'process' => 999901, 'active' => true],
            ['parent_id' => 102, 'title' => 'Tipos de exemplar', 'description' => 'Tipos de exemplar','link' =>  '/intranet/educar_exemplar_tipo_lst.php', 'icon' => NULL, 'order' => 1,'type' => 5,'parent_old' => 597,'old' => 15885,'process' => 999903, 'active' => true],
            ['parent_id' => 102, 'title' => 'Tipos de situação de exemplar', 'description' => 'Situação','link' =>  '/intranet/educar_situacao_lst.php', 'icon' => NULL, 'order' => 2,'type' => 5,'parent_old' => 602,'old' => 15891,'process' => 999903, 'active' => true],
            ['parent_id' => 102, 'title' => 'Motivos de baixa', 'description' => 'Motivos de baixa do exemplar','link' =>  '/intranet/educar_motivo_baixa_lst.php', 'icon' => NULL, 'order' => 3,'type' => 5,'parent_old' => 600,'old' => 15887,'process' => 999903, 'active' => true],
            ['parent_id' => 103, 'title' => 'Tipos de cliente', 'description' => 'Tipos de cliente','link' =>  '/intranet/educar_cliente_tipo_lst.php', 'icon' => NULL, 'order' => 1,'type' => 5,'parent_old' => 596,'old' => 15886,'process' => 999904, 'active' => true],
            ['parent_id' => 103, 'title' => 'Motivos de suspensão', 'description' => 'Motivos de suspensão do cliente','link' =>  '/intranet/educar_motivo_suspensao_lst.php', 'icon' => NULL, 'order' => 2,'type' => 5,'parent_old' => 607,'old' => 15888,'process' => 999904, 'active' => true],
            ['parent_id' => 148, 'title' => 'Categoria de obras', 'description' => 'Categorias de obras','link' =>  '/intranet/educar_categoria_lst.php', 'icon' => NULL, 'order' => 0,'type' => 6,'parent_old' => 999867,'old' => 999867,'process' => 999866, 'active' => true]
        ];
    }

}
