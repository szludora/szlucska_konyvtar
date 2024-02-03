import Button from "react-bootstrap/Button";
import Card from "react-bootstrap/Card";

export default function Konyv(props) {
  return (
    <Card style={{ marginTop: "2em" }} className="text-center">
      <Card.Body>
        <Card.Title>
          {props.konyv.author + " - " + props.konyv.title}
        </Card.Title>
        <Card.Text>Valami leírás a könyvről....</Card.Text>
        <Card.Footer className="text-muted">
          <Button variant="primary" style={{ width: "100%" }}>
            Gomb
          </Button>
        </Card.Footer>
      </Card.Body>
    </Card>
  );
}
