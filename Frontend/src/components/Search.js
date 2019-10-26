import React from "react";
import { MDBCol, MDBIcon } from "mdbreact";
import './Search.css';

const SearchPage = () => {
  return (
    <div className='searchForm'>
    <MDBCol md="9">
      <form  style={{textAlign:'center',justifyContent:'center'}} className="form-inline mt-5 mb-8 ml-2">
        <input style={{height:'40px' ,border : '1px solid black' }} className="form-control form-control-sm ml-3 w-75" type="text" placeholder="Nama Produk" aria-label="Search" />
        <MDBIcon icon="search" style={{paddingLeft:'-30px'}}/>     
      </form>
    </MDBCol>
    </div>
  );
}
export default SearchPage;