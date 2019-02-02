{extends "$layout"}

{block name="content"}    
  <section>
        {if $status == 0}
            <p>{$error nofilter}</p>
        {/if}
        {if $status == 1}
            <p>{$message nofilter}</p>  
{literal}<script>setTimeout(function(){ location.href='{/literal}{$red_url nofilter}{literal}'; } ,3000);</script>	{/literal}			
        {/if}
        {if $status == 2}
            <p>{$error nofilter}</p>            
        {/if}
        
        {if $status == 3}
            <p>{$message nofilter}</p>            
        {/if}
  </section>
    
{/block}
