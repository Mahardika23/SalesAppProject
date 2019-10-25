import React from 'react';
import ItemFeature from '../../../components/molecules/ItemFeature';
import {View} from 'react-native';
        
const CatalogHome = () => {
    return (
        <View>
          {/* Coloum 1 */}
          <View style={{marginLeft:40, flexDirection: 'row', paddingBottom:10}}>

            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/1.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/2.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/3.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/4.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/1.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/2.jpg')}/>

          </View>

          {/* Coloum 2 */}
          <View style={{marginLeft:40, flexDirection: 'row'}}>
        
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/3.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/4.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/1.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/2.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/3.jpg')}/>
            <ItemFeature itemName="Nama Item" img={require('../../../assets/img/4.jpg')}/>

          </View>
        </View>
    )
}

export default CatalogHome;