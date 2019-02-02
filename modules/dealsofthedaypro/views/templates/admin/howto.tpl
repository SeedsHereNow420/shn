{**
 * NOTICE OF LICENSE.
 *
 * This source file is subject to the following license: REGULAR LICENSE
 * that is bundled with this package in the file LICENSE.txt.
 *
 * DISCLAIMER
 *
 * Do not edit or add to this file if you wish to upgrade to newer
 * versions in the future.
 *
 * @author    VaSibi
 * @copyright VaSibi
 * @license   REGULAR LICENSE
 *}
<div id="howto">
        <div class="panel">
        <div class="panel-heading">
            <i class="icon-cogs"></i> {l s='Additional instructions' mod='dealsofthedaypro'}
        </div>
        <h4>{l s='Custom hook' mod='dealsofthedaypro'}</h4>
        <p>
            {l s='You can use this custom hook to place a deals countdown anywhere in your template:' mod='dealsofthedaypro'}
            <b>{literal}<pre>{hook h='displayDealsOftheDayPro' id_slider=X}</pre>{/literal}</b>
            ({l s='Replace X by some of the existing block ID' mod='dealsofthedaypro'})
        </p>
        <p>
            {l s='Here is example:' mod='dealsofthedaypro'} <br>
            <ul>
                <li>
                    {l s='In' mod='dealsofthedaypro'} <b>product.tpl</b> {l s='use' mod='dealsofthedaypro'}
                    {literal}<pre>{hook h='displayDealsOftheDayPro' id_slider=4}</pre>{/literal}
                </li>
            </ul>
        </p>

        <p>{l s='Simply paste code to some place in your template file.' mod='dealsofthedaypro'}</p>
        </div>
</div>
