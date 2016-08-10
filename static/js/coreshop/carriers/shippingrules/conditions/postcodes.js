/**
 * CoreShop
 *
 * LICENSE
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) 2015-2016 Dominik Pfaffenbauer (https://www.pfaffenbauer.at)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

pimcore.registerNS('pimcore.plugin.coreshop.carrier.shippingrules.conditions.postcodes');

pimcore.plugin.coreshop.carrier.shippingrules.conditions.postcodes = Class.create(pimcore.plugin.coreshop.rules.conditions.abstract, {
    type : 'postcodes',

    getForm : function () {

        var postCodesValues = '';

        if (this.data) {
            if (this.data.postcodes) {
                postCodesValues = this.data.postcodes;
            }
        }

        var postcodes = new Ext.form.TextArea({
            fieldLabel:t('coreshop_condition_postcodes'),
            name:'postcodes',
            value : postCodesValues
        });

        this.form = Ext.create('Ext.form.FieldSet', {
            items : [
                postcodes
            ]
        });

        return this.form;
    }
});
