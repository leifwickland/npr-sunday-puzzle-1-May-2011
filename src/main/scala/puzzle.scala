import scala.io.Source
import scala.collection.immutable.TreeSet

object puzzle extends Application {
  val oneLetterElements = "hbcnofpskvyiwu";
  val twoLetterElements = "he li be ne na mg al si cl ar ca sc ti cr mn fe co ni cu zn ga ge as se br kr rb sr zr nb mo tc ru rh pd ag cd in sn sb te xe cs ba lu hf ta re os ir pt au hg tl pb bi po at rn fr ra lr rf db sg bh hs mt ds rg cn la ce pr nd pm sm eu gd tb dy ho er tm yb ac th pa np pu am cm bk cf es fm md no".split(" ")
  val colleges = Source.fromFile("college").getLines.foldLeft(new TreeSet[String]) { (tree,line) => tree + line }

  for (college <- colleges;
       (c, index) <- college.zipWithIndex if oneLetterElements.contains(c);
       newName <- twoLetterElements.map(college.patch(index, _, 1)) if colleges.contains(newName))
    printf("%s -> %s\n", college, newName)
}
