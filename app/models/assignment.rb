class Assignment
  include Mongoid::Document
  belongs_to :instructor
  has_many :repositories

  field :name
  field :description
  field :due_date
  field :up_to
  field :mark
  field :course_name
  field :course_id


end
