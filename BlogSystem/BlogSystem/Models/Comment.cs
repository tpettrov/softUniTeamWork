using System;
using System.Collections.Generic;
using System.ComponentModel.DataAnnotations;
using System.ComponentModel.DataAnnotations.Schema;
using System.Linq;
using System.Web;

namespace BlogSystem.Models
{
    public class Comment
    {

        public Comment()
        {
            this.Date = DateTime.Now;
        }

        [Key]
        public int Id { get; set; }

        [Required]
        [DataType(DataType.MultilineText)]
        [Display(Name = "Текст")]
        public string Body { get; set; }

        [Display(Name = "Автор")]
        [ForeignKey("Author_Id")]
        public ApplicationUser Author { get; set; }

        [ForeignKey("Post_Id")]
        public Post Post { get; set; }

        public int Post_Id { get; set; }
        public string Author_Id { get; set; }

        [Required]
        [Display(Name = "Дата")]
        public DateTime Date { get; set; }
    }

    
}