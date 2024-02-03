import "./App.css";
import DataService from "./model/DataService";
import { useEffect, useState } from "react";
const DS = new DataService();

function App() {
  let vegpont = "/books";
  const [objLista, setObjLista] = useState([{}]);

  useEffect(() => {
    DS.getData(vegpont, setObjLista);
  }, []);
  return (
    <div className="App">
      <header className="App-header"></header>
      <p>{objLista[0].book_id}</p>
      <p>{objLista[0].author}</p>
      <p>{objLista[0].title}</p>
    </div>
  );
}

export default App;
