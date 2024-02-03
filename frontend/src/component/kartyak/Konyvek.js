import Konyv from "./Konyv";
import Col from "react-bootstrap/Col";

export default function Konyvek(props) {
  function megjelenit(lista) {
    return lista.map((elem, index) => {
      return (
        <Col md={3} lg={4} key={index}>
          <Konyv konyv={elem} />
        </Col>
      );
    });
  }

  return megjelenit(props.konyvek);
}