{extends file="layout.tpl"}
{block name="main"}
    <h1>Index API</h1>
    <ul>
        <li><a href="/index.php/api/meridiens/all">Voir les méridiens (/index.php/api/meridiens/all)</a></li>
        <li><a href="/index.php/api/symptomes/all">Voir les symptômes (/index.php/api/symptomes/all)</a></li>
        <li><a href="/index.php/api/pathosympto/all">Voir les symptômes liés aux méridiens (/index.php/api/pathosympto/all)</a></li>
        <li><a href="/index.php/api/pathologies/all">Voir les pathologies (/index.php/api/pathologies/all)</a></li>
        <!--
        <li><a href="javascript:void(0)">Voir les pathologies par symptômes (EN COURS) (/index.php/api/pathologies/byKeyword/:keyword)</a></li>
           -->
    </ul>
{/block}