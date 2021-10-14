{extends file="layout.tpl"}
{block name="main"}



    <div style="display: flex;  align-items: center;  justify-content: center;">
        <button type="button" class="btn btn-primary btn-lg" style="margin :50px">Type</button>
        <button type="button" class="btn btn-secondary btn-lg" style="margin :50px">Méridien</button>
        <button type="button" class="btn btn-secondary btn-lg" style="margin :50px">Symptômes</button>
    </div>

    {$i=0}
    {foreach from=$pathos item=patho}
        {if $i%3==0}
            <div style="display: flex;  align-items: center;  justify-content: center;">
        {/if}
        
            <div class="card" style="width: 18rem; margin :100px">
                <div class="card-body">
                    <h5 class="card-title">{$patho->getDesc()}</h5>
                    <p class="card-text">Symptomes : {$patho->getSymptome()}</p>
                    <a href="#" class="btn btn-primary">Plus d'informations</a>
                </div>
            </div>
            

        
        {if $i%3==2}
            </div>   
        {/if}
        {$i=$i+1}
    {/foreach}
   
    
{/block}


